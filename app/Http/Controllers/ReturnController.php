<?php

namespace App\Http\Controllers;

use App\Models\AccountTransaction;
use App\Models\ActualPayment;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ReturnItem;
use App\Models\Returns;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;

class ReturnController extends Controller
{
    public function Return($id)
    {
        $sale = Sale::findOrFail($id);
        return view('pos.return.return', compact('sale'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'products' => 'required',
        ]);

        if ($validator->passes()) {

            $productCost = 0;
            $productAll = $request->products;
            foreach ($productAll as $product) {
                $items = Product::findOrFail($product['product_id']);
                $productCost += $items->cost;
            }

            $sale = Sale::findOrFail($request->sale_id);
            $sale->paid = $sale->paid - $request->change_amount;
            $sale->due =  $sale->due + $request->change_amount;
            $sale->profit = $productCost - $request->change_amount;
            $sale->quantity = $request->quantity;
            if ($sale->total > $request->total_amount) {
                $sale->total = $request->total_amount;
            } else {
                $sale->total = $sale->total - $request->total_amount;
            }
            $sale->discount = $request->discount;
            if ($sale->change_amount > $request->total) {
                $sale->change_amount = $request->total;
            } else {
                $sale->change_amount = $request->total;
            }
            $sale->actual_discount = $request->actual_discount;
            $sale->tax = $request->tax;
            $sale->receivable = $request->change_amount;
            // $sale->paid = $request->paid;
            $sale->due = $request->due;
            if ($request->due < 0) {
                $sale->paid = $request->paid + $request->due;
            } else {
                $sale->paid = $request->paid;
            }
            // $sale->returned = $request->due;
            $sale->final_receivable = $request->change_amount;
            $sale->payment_method = $request->payment_method;
            $sale->profit = $request->change_amount - $productCost;
            // dd($productCost);
            $sale->total_purchase_cost = $productCost;
            $sale->note = $request->note;
            $sale->created_at = Carbon::now();
            $sale->save();

            // dd($return->id);

            $products = $request->products;
            foreach ($products as $product) {
                $items = Product::findOrFail($product['product_id']);
                $saleItem = new SaleItem;
                $saleItem->sale_id = $request->sale_id;
                $saleItem->product_id = $product['product_id'];
                $saleItem->qty = $product['quantity'];
                $saleItem->rate = $product['unit_price']; // Access 'unit_price' as an array key
                $saleItem->discount = $product['discount'];
                $saleItem->sub_total = $product['total_price'];
                $saleItem->total_purchase_cost = $items->cost;
                $saleItem->save();


                $items->stock = $items->stock + $product['quantity'];
                $items->total_sold = $items->total_sold - $product['quantity'];
                $items->save();
            }


            $customer = Customer::findOrFail($request->customer_id);
            $customer->total_receivable = $customer->total_receivable + $request->change_amount;
            $customer->total_payable = $customer->total_payable + $request->paid;
            $customer->wallet_balance = $customer->wallet_balance + ($request->change_amount - $request->paid);
            $customer->save();

            // actual Payment 
            $actualPayment = new ActualPayment;
            $actualPayment->branch_id =  Auth::user()->branch_id;
            $actualPayment->payment_type =  'receive';
            $actualPayment->payment_method =  $request->payment_method;
            $actualPayment->customer_id = $request->customer_id;
            $actualPayment->amount = $request->paid;
            $actualPayment->date = $request->sale_date;
            $actualPayment->save();


            // accountTransaction table 
            $accountTransaction = new AccountTransaction;
            $accountTransaction->branch_id =  Auth::user()->branch_id;
            $accountTransaction->purpose =  'Withdraw';
            $accountTransaction->account_id =  $request->payment_method;
            $accountTransaction->credit = $request->paid;
            // $accountTransaction->balance = $accountTransaction->balance + $request->paid;
            $accountTransaction->save();


            $transaction = Transaction::where('customer_id', $request->customer_id)->first();

            if ($transaction) {
                // Update existing transaction
                $transaction->date =  $request->sale_date;
                $transaction->payment_type = 'receive';
                $transaction->particulars = 'Sale#' . $request->sale_id;
                $transaction->credit = $transaction->credit + $request->change_amount;
                $transaction->debit = $transaction->debit + $request->paid;
                $transaction->balance = $transaction->balance + ($request->change_amount - $request->paid);
                $transaction->payment_method = $request->payment_method;
                $transaction->save();
            } else {
                // Create new transaction
                $transaction = new Transaction;
                $transaction->date =  $request->sale_date;
                $transaction->payment_type = 'receive';
                $transaction->particulars = 'Sale#' . $request->sale_id;
                $transaction->customer_id = $request->customer_id;
                $transaction->credit = $request->change_amount;
                $transaction->debit = $request->paid;
                $transaction->balance = $request->change_amount - $request->paid;
                $transaction->payment_method = $request->payment_method;
                $transaction->save();
            }

            return response()->json([
                'status' => 200,
                'message' => 'successfully Replace Products',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages(),
            ]);
        }
    }
    public function storeReturnItem(Request $request)
    {
        // dd($request->all());
        $productCost = 0;
        $productAll = $request->products;
        foreach ($productAll as $product) {
            $items = Product::findOrFail($product['product_id']);
            $productCost += $items->cost;
        }
        $saleItem = SaleItem::where('sale_id', $request->sale_id)->where('product_id', $request->id)->latest()->first();

        $return = Returns::where('sale_id', $request->sale_id)->first();

        if ($return) {
            // Record exists, update it
            $return->customer_id = $request->customer_id;
            $return->total = $request->total_amount;
            $return->discount_amount = $request->actual_discount;
            $return->grand_total = $request->change_amount;
            $return->created_at = Carbon::now();
        } else {
            // Record does not exist, create a new one
            $return = new Returns;
            $return->sale_id = $request->sale_id;
            $return->customer_id = $request->customer_id;
            $return->total = $request->total_amount;
            $return->discount_amount = $request->actual_discount;
            $return->grand_total = $request->change_amount;
            $return->created_at = Carbon::now();
        }

        $return->save();

        $returnItems = new ReturnItem;
        $returnItems->return_id = 0;
        // $returnItems->sale_item_id = $product['product_id']; 
        $returnItems->product_id = $request->id;
        $returnItems->quantity = $saleItem->qty;
        $returnItems->unit_price = $saleItem->rate; // Access 'unit_price' as an array key
        $returnItems->discount_amount = $saleItem->discount;
        $returnItems->total = $saleItem->sub_total;
        $returnItems->save();

        $saleItem->delete();

        return response()->JSON([
            'status' => 200,
            'message' => 'Successfully returned product',
        ]);
    }
    public function returnProductsList()
    {
        $returns = Returns::get();
        return view('pos.return.return-view', compact('returns'));
    }
    public function returnProductsDelete($id)
    {
        $return = Returns::findOrFail($id);
        $return->delete();
        return back()->with('message', "Return successfully Deleted");
    }
    public function returnProductsInvoice($id)
    {
        $return = Returns::findOrFail($id);
        return view('pos.return.return-invoice', compact('return'));
    }
}

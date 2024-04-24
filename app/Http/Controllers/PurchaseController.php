<?php

namespace App\Http\Controllers;

use App\Models\ActualPayment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('pos.purchase.purchase');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'products' => 'required',
            'purchse_date' => 'required',
            'payment_method' => 'required',
        ]);


        if ($validator->passes()) {
            $purchase = new Purchase;
            $purchase->branch_id = Auth::user()->branch_id;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->purchse_date = $request->purchse_date;
            $purchase->total_quantity = $request->total_quantity;
            $purchase->total_amount = $request->total_amount;
            $purchase->discount = $request->discount;
            $purchase->discount_amount = $request->discount_amount;
            $purchase->sub_total = $request->sub_total;
            $purchase->tax = $request->tax;
            $purchase->grand_total = $request->grand_total;
            $purchase->paid = $request->paid;
            $purchase->due = $request->due;
            $purchase->carrying_cost = $request->carrying_cost;
            $purchase->payment_method = $request->payment_method;
            $purchase->note = $request->note;
            $purchase->save();

            $purchaseId = $purchase->id;

            $products = $request->products;
            foreach ($products as $product) {
                $items = new PurchaseItem;
                $items->purchase_id = $purchaseId;
                $items->product_id = $product['product_id']; // Access 'product_id' as an array key
                $items->unit_price = $product['unit_price']; // Access 'unit_price' as an array key
                $items->quantity = $product['quantity'];
                $items->total_price = $product['unit_price'] * $product['quantity'];
                $items->save();

                $items2 = Product::findOrFail($product['product_id']);
                $items2->stock = $items2->stock + $product['quantity'];
                $items2->save();
            }

            $actualPayment = new ActualPayment;
            $actualPayment->branch_id =  Auth::user()->branch_id;
            $actualPayment->payment_type =  'pay';
            $actualPayment->payment_method =  $request->payment_method;
            $actualPayment->supplier_id = $request->supplier_id;
            $actualPayment->amount = $request->paid;
            $actualPayment->date = $request->purchse_date;
            $actualPayment->save();

            $transaction = Transaction::where('supplier_id', $request->supplier_id)->first();

            if ($transaction) {
                // Update existing transaction
                $transaction->date = $request->purchse_date;
                $transaction->payment_type = 'pay';
                $transaction->particulars = 'Purchase#' . $purchaseId;
                $transaction->credit = $transaction->credit + $request->grand_total;
                $transaction->debit = $transaction->debit + $request->paid;
                $transaction->balance = $transaction->balance + ($request->paid - $request->grand_total);
                $transaction->payment_method = $request->payment_method;
                $transaction->save();
            } else {
                // Create new transaction
                $transaction = new Transaction;
                $transaction->date = $request->purchse_date;
                $transaction->payment_type = 'pay';
                $transaction->particulars = 'Purchase#' . $purchaseId;
                $transaction->supplier_id = $request->supplier_id;
                $transaction->credit = $request->grand_total;
                $transaction->debit = $request->paid;
                $transaction->balance = $request->paid - $request->grand_total;
                $transaction->payment_method = $request->payment_method;
                $transaction->save();
            }



            $supplier = Supplier::findOrFail($request->supplier_id);
            $supplier->total_receivable = $supplier->total_receivable + $request->grand_total;
            $supplier->total_payable = $supplier->total_payable + $request->paid;
            $supplier->wallet_balance = $supplier->wallet_balance + ($request->paid - $request->grand_total);
            $supplier->save();


            return response()->json([
                'status' => 200,
                'purchaseId' => $purchase->id,
                'message' => 'successfully save',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }
    public function invoice($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('pos.purchase.invoice', compact('purchase'));
    }

    public function view()

    {
        $purchase = Purchase::where('branch_id', Auth::user()->branch_id)->latest()->get();
        return view('pos.purchase.view', compact('purchase'));
    }

    // public function viewDetails($id)
    // {
    //     $purchase = Purchase::findOrFail($id);
    //     return view('pos.purchase.show', compact('purchase'));
    // }
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('pos.purchase.edit', compact('purchase'));
    }
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return back()->with('message', "Purchase successfully Deleted");
    }
    public function filter(Request $request)
    {
        // dd($request->all());
        $purchaseQuery = Purchase::query();

        // Filter by product_id if provided
        if ($request->product_id !="Select Product") {
            $purchaseQuery->whereHas('purchaseItem', function($query) use ($request) {
                $query->where('product_id', $request->product_id);
            });
        }

        // Filter by supplier_id if provided
        if ($request->supplier_id !="Select Supplier") {
            $purchaseQuery->where('supplier_id', $request->supplier_id);
        }

        // Filter by date range if both start_date and end_date are provided
        if ($request->start_date && $request->end_date) {
            $purchaseQuery->whereBetween('purchase_date', [$request->start_date, $request->end_date]);
        }

        // Execute the query
        $purchase = $purchaseQuery->get();

        return view('pos.purchase.table', compact('purchase'))->render();
    }
}

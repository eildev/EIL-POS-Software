<?php

namespace App\Http\Controllers;

use App\Models\ActualPayment;
use App\Models\Purchase;
use App\Models\PurchaseItem;
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
        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'products' => 'required',
            'purchse_date' => 'required',
            'discount' => 'required',
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
            $purchase->paid = $request->paid;
            $purchase->due = $request->due;
            $purchase->carrying_cost = $request->carrying_cost;
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
            }

            $actualPayment = new ActualPayment;
            $actualPayment->branch_id =  Auth::user()->branch_id;
            $actualPayment->payment_type =  'pay';
            $actualPayment->payment_method =  $request->payment_method;
            $actualPayment->supplier_id = $request->supplier_id;
            $actualPayment->amount = $request->paid;
            $actualPayment->date = $request->purchse_date;
            $actualPayment->save();


            $transaction = new Transaction;
            $transaction->date = $request->purchse_date;
            $transaction->payment_type = 'pay';
            $transaction->particulars = 'Purchase#' . $purchaseId;
            $transaction->supplier_id = $request->supplier_id;
            $transaction->credit = $request->paid;
            $transaction->balance = $request->paid;
            $transaction->payment_method = $request->payment_method;
            $transaction->save();


            return response()->json([
                'status' => 200,
                'message' => 'successfully save',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }
}

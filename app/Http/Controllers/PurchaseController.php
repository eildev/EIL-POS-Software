<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('pos.purchase.purchase');
    }
    public function store(Request $request)
    {
        // dd($request->supplier_id);
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
        return response()->json([
            'status' => 200,
            'message' => 'successfully save',
        ]);
    }
}

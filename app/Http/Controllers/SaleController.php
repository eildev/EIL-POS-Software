<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SaleController extends Controller
{
    public function index()
    {
        return view('pos.sale.sale');
    }
    public function getCustomer()
    {
        $data = Customer::all();
        return response()->json([
            'status' => 200,
            'message' => 'successfully save',
            'allData' => $data
        ]);
    }
    public function addCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->passes()) {
            $customer = new Customer;
            $customer->branch_id = Auth::user()->branch_id;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->opening_receivable = $request->opening_receivable ?? 0;
            $customer->opening_payable = $request->opening_payable ?? 0;
            $customer->wallet_balance = $request->wallet_balance ?? 0;
            $customer->total_receivable = $request->total_receivable ?? 0;
            $customer->total_payable = $request->total_payable ?? 0;
            $customer->created_at = Carbon::now();
            $customer->save();
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'products' => 'required',
            'sale_date' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->passes()) {
            $sale = new Sale;
            $sale->branch_id = Auth::user()->branch_id;
            $sale->customer_id = $request->customer_id;
            $sale->sale_date = $request->sale_date;
            $sale->sale_by = 0;
            $sale->invoice_number = rand(123456, 99999);
            $sale->order_type = "general";
            $sale->quantity = $request->quantity;
            $sale->total = $request->total;
            $sale->discount = $request->discount;
            $sale->actual_discount = $request->actual_discount;
            $sale->tax = $request->tax;
            $sale->change_amount = $request->change_amount;
            $sale->paid = $request->paid;
            $sale->due = $request->due;
            $sale->returned = $request->due;
            $sale->receivable = $request->change_amount;
            $sale->final_receivable = $request->change_amount;
            $sale->payment_method = $request->payment_method;
            $sale->note = $request->note;
            $sale->save();

            $saleId = $sale->id;

            $products = $request->products;
            foreach ($products as $product) {
                $items = new SaleItem;
                $items->sale_id = $saleId;
                $items->product_id = $product['product_id']; // Access 'product_id' as an array key
                $items->rate = $product['unit_price']; // Access 'unit_price' as an array key
                $items->qty = $product['quantity'];
                $items->sub_total = $product['unit_price'] * $product['quantity'];
                $items->total_purchase_cost = $product['unit_price'] * $product['quantity'];
                $items->save();
            }

            return response()->json([
                'status' => 200,
                'saleId' => $saleId,
                'message' => 'successfully save',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages(),
            ]);
        }
    }
    public function invoice($id)
    {
        $sale = Sale::findOrFail($id);
        return view('pos.sale.invoice', compact('sale'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReturnItem;
use App\Models\Returns;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
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



            // $saleItems = SaleItem::where('sale_id', $request->sale_id)->get();


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
            $sale->note = $request->note;
            $sale->created_at = Carbon::now();
            $sale->save();


            $return = new Returns;
            $return->sale_id = $request->sale_id;
            $return->customer_id = $request->customer_id;
            $return->total = $request->total_amount;
            $return->discount_amount = $request->actual_discount;
            $return->grand_total = $request->change_amount;
            $return->save();

            $return_id = $return->id;
            // dd($return->id);

            // $products = $request->products;
            // foreach ($products as $product) {
            //     $items = Product::findOrFail($product['product_id']);
            //     $returnItems = new ReturnItem;
            //     $returnItems->return_id = $return_id;
            //     // $returnItems->sale_item_id = $product['product_id']; 
            //     $returnItems->product_id = $product['product_id'];
            //     $returnItems->quantity = $product['quantity'];
            //     $returnItems->unit_price = $product['unit_price']; // Access 'unit_price' as an array key
            //     $returnItems->discount_amount = $product['discount'];
            //     $returnItems->total = $product['total_price'];
            //     $returnItems->save();


            //     $items->stock = $items->stock + $product['quantity'];
            //     $items->total_sold = $items->total_sold - $product['quantity'];
            //     $items->save();
            // }
            return response()->json([
                'status' => 200,
                'message' => 'successfully return',
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
        dd($request->all());
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
        } else {
            // Record does not exist, create a new one
            $return = new Returns;
            $return->sale_id = $request->sale_id;
            $return->customer_id = $request->customer_id;
            $return->total = $request->total_amount;
            $return->discount_amount = $request->actual_discount;
            $return->grand_total = $request->change_amount;
        }

        $return->save();

        dd($return->id);


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
        $sale->note = $request->note;
        $sale->created_at = Carbon::now();
        $sale->save();




        $returnItems = new ReturnItem;
        $returnItems->return_id = 0;
        // $returnItems->sale_item_id = $product['product_id']; 
        $returnItems->product_id = $request->id;
        $returnItems->quantity = $saleItem->qty;
        $returnItems->unit_price = $saleItem->rate; // Access 'unit_price' as an array key
        $returnItems->discount_amount = $saleItem->discount;
        $returnItems->total = $saleItem->sub_total;
        $returnItems->save();

        // $saleItem = SaleItem::where('sale_id', $request->saleId)->where('product_id', $request->id)->latest()->first();
        $saleItem->delete();

        return response()->JSON([
            'status' => 200,
            'message' => 'Successfully returned product',
        ]);
    }
}

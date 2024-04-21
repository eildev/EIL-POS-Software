<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\PromotionDetails;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function PromotionAdd()
    {
        return view('pos.promotion.promotion_add');
    } //
    public function PromotionStore(Request $request)
    {
        Promotion::insert([
            'promotion_name' => $request->promotion_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);
    } //End Method

    public function PromotionView()
    {
        $promotions = Promotion::all();
        return view('pos.promotion.promotion_view', compact('promotions'));
    } //End Method
    public function PromotionEdit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('pos.promotion.promotion_edit', compact('promotion'));
    } //End Method
    public function PromotionUpdate(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id)->update([
            'promotion_name' => $request->promotion_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);
    } //End Method
    public function PromotionDelete($id)
    {
        Promotion::findOrFail($id)->delete();
        $notification = [
            'message' => 'Promotion Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);
    } //End Method
    // find
    public function find($id)
    {
        $promotion = Promotion::findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $promotion,
        ]);
    } //End Method



    ///////////////////////Start Promotion Details All Method ////////////////////////
    public function PromotionDetailsAdd()
    {
        $product = Product::latest()->get();
        $promotions = Promotion::latest()->get();
        return view('pos.promotion.promotion_details_add', compact('product', 'promotions'));
    } //
    public function PromotionDetailsStore(Request $request)
    {
        PromotionDetails::insert([
            'promotion_id' => $request->promotion_id,
            'Product_id' => $request->Product_id,
            'additional_conditions' => $request->additional_conditions,
            'created_at' =>  Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Details Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.details.view')->with($notification);
    } //End Method
    public function PromotionDetailsView()
    {
        $promotion_details = PromotionDetails::all();
        return view('pos.promotion.promotion_details_view', compact('promotion_details'));
    } //End Method
    public function PromotionDetailsEdit($id)
    {
        $product = Product::latest()->get();
        $promotions = Promotion::latest()->get();
        $promotion_details = PromotionDetails::findOrFail($id);
        return view('pos.promotion.promotion_details_edit', compact('promotion_details', 'product', 'promotions'));
    } //End Method
    public function PromotionDetailsUpdate(Request $request)
    {
        PromotionDetails::findOrFail($request->id)->update([
            'promotion_id' => $request->promotion_id,
            'Product_id' => $request->Product_id,
            'additional_conditions' => $request->additional_conditions,
            'updated_at' =>  Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Details Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.details.view')->with($notification);
    } //
    public function PromotionDetailsDelete($id)
    {
        PromotionDetails::findOrFail($id)->delete();
        $notification = [
            'message' => 'Promotion Details Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.details.view')->with($notification);
    }
}

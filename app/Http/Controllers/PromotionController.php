<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Carbon\Carbon;
class PromotionController extends Controller
{
    public function PromotionAdd(){
        return view('pos.promotion.promotion_add');
    }//
    public function PromotionStore(Request $request){
        Promotion::insert([
            'promotion_name' =>$request->promotion_name,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'discount_type' =>$request->discount_type,
            'discount_value' =>$request->discount_value,
            'description' =>$request->description,
            'created_at' =>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);
    }//End Method

    public function PromotionView(){
        $promotions = Promotion::all();
        return view('pos.promotion.promotion_view',compact('promotions'));
    }//End Method
    public function PromotionEdit($id){
        $promotion = Promotion::findOrFail($id);
        return view('pos.promotion.promotion_edit',compact('promotion'));
    }//End Method
    public function PromotionUpdate(Request $request, $id){
        $promotion = Promotion::findOrFail($id)->update([
            'promotion_name' =>$request->promotion_name,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'discount_type' =>$request->discount_type,
            'discount_value' =>$request->discount_value,
            'description' =>$request->description,
            'updated_at' =>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Promotion Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);

    }//End Method
    public function PromotionDelete($id){
        Promotion::findOrFail($id)->delete();
        $notification = [
           'message' => 'Promotion Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('promotion.view')->with($notification);
    }//End Method
    ///////////////////////Start Promotion Details All Method ////////////////////////


}

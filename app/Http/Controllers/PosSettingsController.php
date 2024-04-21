<?php

namespace App\Http\Controllers;
use App\Models\PosSetting;
use Illuminate\Http\Request;

class PosSettingsController extends Controller
{
    public function PosSettingsAdd(Request $request){
        $allData = PosSetting::whereId(1)->first();
        return view('pos.pos_settings.add_pos_settings',compact('allData'));

    }//
    public function switch_mode(Request $request){
        if($request->has('dark_mode')){
            $mdVal=2;
         }
         else{
            $mdVal=1;
         }
        //  dd($mdVal);
         $PosSetting = PosSetting::all()->first();
         $PosSetting->dark_mode = $mdVal;
         $PosSetting->update();
        return back();
    }//
    public function PosSettingsStore(Request $request){
        // PosSetting
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            'company' => 'required', // Adjust the validation rules as needed
            // Add validation rules for other fields
        ]);
        if ($request->hasFile('logo')) {
            $imageName = rand() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/pos_setting/'), $imageName);
             $requestData['logo'] = 'uploads/pos_setting/' . $imageName;
             $settingId = $request->input('setting_id');
             // $requestData = $request->all();
             if($request->has('dark_mode')){
                $mdVal=2;
             }
             else{
                $mdVal=1;
             }
             $values = [
              'company' => $request->input('company'),
             'email' => $request->input('email'),
             'facebook' => $request->input('facebook'),
             'header_text' => $request->input('header_text'),
             'footer_text' => $request->input('footer_text'),
             'phone' => $request->input('phone'),
             'address' => $request->input('address'),
             'invoice_logo_type' => $request->input('invoice_logo_type'),
             'invoice_type' => $request->input('invoice_type'),
             'barcode_type' => $request->input('barcode_type'),
             'dark_mode' => $mdVal, // Checkbox value can be checked directly
             'low_stock' => $request->input('low_stock'),
             'logo' => $requestData['logo'] ?? null,
                // Add more fields as needed
             ];
             PosSetting::updateOrCreate(['id' => $settingId],$values);
        }
        else{
            $settingId = $request->input('setting_id');
            $values = [
            'company' => $request->input('company'),
            'email' => $request->input('email'),
            'facebook' => $request->input('facebook'),
            'header_text' => $request->input('header_text'),
            'footer_text' => $request->input('footer_text'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'invoice_logo_type' => $request->input('invoice_logo_type'),
            'invoice_type' => $request->input('invoice_type'),
            'barcode_type' => $request->input('barcode_type'),
            'dark_mode' => $request->has('dark_mode'), // Checkbox value can be checked directly
            'low_stock' => $request->input('low_stock'),
        ];
        PosSetting::updateOrCreate(['id' => $settingId],$values);
        }
        $notification = [
            'message' => 'Settings updated successfully!',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }//
    public function PosSettingsEdit(){
        $allData = PosSetting::findOrFail(1);
        return view('pos.pos_settings.add_pos_settings');
    }//
}

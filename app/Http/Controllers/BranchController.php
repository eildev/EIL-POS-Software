<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Branch;
class BranchController extends Controller
{
   public function  index(){

    return view('branches.index');
   }//

   public function store(Request $request){
    $request->validate([
        'name' => 'required|max:200',
        'phone' => 'required',
        'address' => 'required',
        'email' => 'required',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    if ($request->hasFile('logo')) {
        $imageName = rand() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads/branch/'), $imageName);
        $bracnch = new Branch;
        $bracnch->name =$request->name;
        $bracnch->phone = $request->phone;
        $bracnch->address =$request->address;
        $bracnch->email = $request->email;
        $bracnch->logo = $imageName;
        $bracnch->save();
        $notification = array(
            'message' =>'branch Created Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('branch.view')->with($notification);
    }
   }//End Method
   public function BranchView(){
    $branches = Branch::latest()->get();
    return view('branches.all-branches',compact('branches'));
   }//End Method
   public function BranchEdit($id){
    $branch = Branch::find($id);
    return view('branches.edit-branch',compact('branch'));
   }//End Method
   public function BranchUpdate(Request $request,$id){
   
   
    if ($request->hasFile('logo')) {
        $request->validate([
            'name' => 'required|max:200',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        $imageName = rand() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads/branch/'), $imageName);
        $branch = Branch::find($id);
        $path = public_path('uploads/branch/'.$branch->logo);
        if(file_exists($path)){
            @unlink($path);
        }
        $branch->name =$request->name;
        $branch->phone = $request->phone;
        $branch->address =$request->address;
        $branch->email = $request->email;
        $branch->logo = $imageName;
        $branch->save();
        $notification = array(
            'message' =>'branch Updated Successfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('branch.view')->with($notification);
    
        }else{
            $request->validate([
                'name' => 'required|max:200',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'required',
            ]);
            $branch = Branch::find($id);
            $branch->name =$request->name;
            $branch->phone = $request->phone;
            $branch->address =$request->address;
            $branch->email = $request->email;
            $branch->save();
            $notification = array(
                'message' =>'branch Updated  Successfully without logo ',
                'alert-type'=> 'info'
             );
            return redirect()->route('branch.view')->with($notification);
        }
   }//End Method
   public function BranchDelete($id){
    $branch = Branch::find($id);
    $path = public_path('uploads/branch/'.$branch->logo);
    if(file_exists($path)){
        @unlink($path);
    }
    $branch->delete();
    $notification = array(
        'message' =>'Branch Deleted Successfully',
        'alert-type'=> 'info'
     );
    return redirect()->route('branch.view')->with($notification);
   }//End Method
}

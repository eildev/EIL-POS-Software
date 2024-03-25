<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
class SubCategoryController extends Controller
{
    //subcategory page view
    public function index(){
        $categories =Category::latest()->get();
        $subcategories =SubCategory::get();
        return view('products.subcategory',compact('categories','subcategories'));
    }//End Method
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255',
            //  'subcategoryImage' => 'required',
        ]);
        //   dd($request->subcategoryImage);
          if ($validator->passes()) {
            // if($request->subcategoryImage){
            // $imageName = rand() . '.' . $request->subcategoryImage->extension();
            // $request->subcategoryImage->move(public_path('uploads/subcategory'), $imageName);
           // $subcategory = SubCategory::all();
           // dd($imageName);
            $subcategories = new SubCategory;
            $subcategories->name =  $request->subcategory_name;
            $subcategories->slug = Str::slug($request->subcategory_name);
            $subcategories->category_id =  $request->category_id;
            //  $subcategories->image =  $imageName;
           //  $subcategories->image =  $request->image;
            $subcategories->save();
            return response()->json([
                'status' => 200,
                'message' => 'SubCategory Save Successfully',
             //   'data' => $subcategory
            ]);
        }
        return response()->json([
            'status' => '500',
            'error' => $validator->messages()
             ]);
            }

     ///Category view
     public function view()
     {
         $subcategories = SubCategory::all();
         return view('products.subcategory-show-table',compact('subcategories'))->render();
     }
     public function edit($id){
        $subcategoryData = SubCategory::findOrFail($id);
        return response()->json([
            'status' => 200,
            'message' => 'SubCategory Save Successfully',
           'data' => $subcategoryData
        ]);
        // return view('products.subcategory')->compact('subcategoryData');
     }
     //delete
     public function destroy($id){
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
    
        return response()->json(['status' => 200, 'message' => 'Subcategory deleted successfully']);
     }
}



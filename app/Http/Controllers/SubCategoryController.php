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
        $subCategories =SubCategory::get();
        return view('products.subcategory',compact('categories','subCategories'));
    }//End Method
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255',
            // 'image' => 'required|max:255',
        ]);
          //dd($request->subcategory_name);
          if ($validator->passes()) {
             $subcategory = SubCategory::all();
            // dd($request->name);
            $subcategories = new SubCategory;
            $subcategories->name =  $request->subcategory_name;
            $subcategories->slug = Str::slug($request->subcategory_name);
            $subcategories->category_id =  $request->category_id;
            // $subcategories->image =  $request->subcategoryImage;
           //  $subcategories->image =  $request->image;
            $subcategories->save();
            return response()->json([
                'status' => 200,
                'message' => 'SubCategory Save Successfully',
                'data' => $subcategory 
            ]);
        }
        return response()->json([
            'status' => '500',
            'error' => $validator->messages()
        ]);
            }

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        // return view('pos.products.category', compact('categories'));
        return view('pos.products.subcategory',compact('categories'));
    }
    public function store(Request $request){
     $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            $subcategory = new SubCategory;
            if ($request->image) {
                $imageName = rand() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/subcategory'), $imageName);
                $subcategory->image = $imageName;
            }
            $subcategory->name =  $request->name;
            $subcategory->slug = Str::slug($request->name);
            $subcategory->category_id =  $request->category_id;
            $subcategory->save();
            return response()->json([
                'status' => 200,
                'message' => 'Sub Category Save Successfully',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }//
    public function view()
    {
        $subcategories = SubCategory::all();
        // return view('pos.products.category-show-table', compact('categories'))->render();
        return response()->json([
            "status" => 200,
            "data" => $subcategories
        ]);
    }//
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::get();
        if ($subcategory) {
            return response()->json([
                'status' => 200,
                'subcategory' => $subcategory
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }//
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);
        if ($validator->passes()) {
            $subcategory = SubCategory::findOrFail($id);
            $subcategory->name =  $request->name;
            $subcategory->slug = Str::slug($request->name);
            $subcategory->category_id =  $request->category_id;
            if ($request->image) {
                $imageName = rand() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/subcategory'), $imageName);
                if ($subcategory->image) {
                    $previousImagePath = public_path('uploads/subcategory') . $subcategory->image;
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }
                $subcategory->image = $imageName;
            }

            $subcategory->save();
            return response()->json([
                'status' => 200,
                'message' => 'sub Category Update Successfully',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }//
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->image) {
            $previousImagePath = public_path('uploads/subcategory/') . $subcategory->image;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        $subcategory->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Sub Category Deleted Successfully',
        ]);
    }//
    public function status($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $newStatus = $subcategory->status == 0 ? 1 : 0;
        $subcategory->update([
            'status' => $newStatus
        ]);
        return response()->json([
            'status' => 200,
            'newStatus' => $newStatus,
            'message' => 'Status Changed Successfully',
        ]);
    }
}

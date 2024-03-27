<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('pos.products.category', compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            $category = new Category;
            if ($request->image) {
                $imageName = rand() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/category/'), $imageName);
                $category->image = $imageName;
            }
            $category->name =  $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            return response()->json([
                'status' => 200,
                'message' => 'Category Save Successfully',
            ]);
        }
        return response()->json([
            'status' => '500',
            'error' => $validator->messages()
        ]);
    }
    public function view()
    {
        $categories = Category::get();
        return view('pos.products.category-show-table', compact('categories'))->render();
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
    public function status($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
}

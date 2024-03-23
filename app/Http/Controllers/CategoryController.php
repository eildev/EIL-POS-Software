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
        // $categories = Category::get();
        // if ($categories) {
        //     return response()->json([
        //         'status' => 200,
        //         'categories' => $categories
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 500,
        //         'categories' => "Data Not Found"
        //     ]);
        // }

        return view('products.category');
    }
    public function store(Request $request)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            $categories = Category::all();
            $category = new Category;
            $category->name =  $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            return response()->json([
                'status' => 200,
                'message' => 'Category Save Successfully',
                'data' => $categories
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
        if ($categories->count() > 0) {
            return response()->json([
                'status' => 200,
                'categories' => $categories
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
}

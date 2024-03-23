<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //subcategory page view
    public function index(){
        $categories =Category::latest()->get();
        $subCategories =SubCategory::get();
        return view('products.subcategory',compact('categories','subCategories'));
    }//End Method
}

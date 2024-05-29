<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
class ReturnController extends Controller
{
    public function Return($id){
        $sale = Sale::findOrFail($id);
        return view('pos.return.return',compact('sale'));
    }
}

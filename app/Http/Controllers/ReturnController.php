<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
class ReturnController extends Controller
{
    public function ReturnAdd(){
        $saleItem = SaleItem::with('product')->get();
        $sale = Sale::with('customer')->get();
        return view('pos.return.return_add',compact('saleItem', 'sale'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function TransactionAdd(){
        return view('pos.transaction.transaction_add');
    }
}

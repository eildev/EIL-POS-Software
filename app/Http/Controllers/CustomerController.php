<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Branch;
class CustomerController extends Controller
{
    public function AddCustomer(){
       
        return view('pos.customer.addcustomer');
    }
}

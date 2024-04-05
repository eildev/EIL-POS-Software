<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use App\Models\Customer;
class TransactionController extends Controller
{
    public function TransactionAdd(){
        $paymentMethod = PaymentMethod::all();
        $supplier = Supplier::latest()->get();
        $customer = Customer::latest()->get();
        return view('pos.transaction.transaction_add',compact('paymentMethod','supplier','customer'));
    }//
    // public function fetchAccountData(Request $request, $accountId)
    // {
    //     // Retrieve the account data based on the account type (supplier or customer)
    //     $accountType = $request->input('accountType');

    //     if ($accountType === 'supplier') {
    //         $accountData = Supplier::find($accountId);
    //     } elseif ($accountType === 'customer') {
    //         $accountData = Customer::find($accountId);
    //     }

    //     // Return the account data as JSON
    //     return response()->json($accountData);
    // }

}

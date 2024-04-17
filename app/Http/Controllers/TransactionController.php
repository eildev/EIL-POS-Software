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
    public function TransactionView(){
        return view('pos.transaction.transaction_view');
    }
    public function getDataForAccountId(Request $request)
    {
        $accountId = $request->input('id');
        //dd($accountId);
        $supplier = Supplier::findOrFail($accountId);
        $customer = Customer::findOrFail($accountId);
        if ($supplier) {
            return response()->json($supplier);
        } else if($customer){
            return response()->json($customer);
        }
        // else {
        //     // Return an error response if the account does not exist
        //     return response()->json(['error' => 'Account not found'], 404);
        // }
    }
    // public function TransactionStore(Request $request){
    //     $transaction = Transaction::create([
    //         'transaction_type' => $request->payment_method_id,
    //        'supplier_id' => $request->supplier_id,
    //         'customer_id' => $request->customer_id,
    //         'amount' => $request->amount,
    //         'payment_type' => $request->payment_type,
    //         'particulars' => $request->particulars,
    //         'credit' => $request->credit,
    //         'balance' => $request->balance,
    //         'payment_method' => $request->payment_method,
    //         'date' => $request->date,
    //         'note' => $request->note,
    //     ]);
    //     $notification = [
    //         'message' => 'Transaction Added Successfully',
    //         'alert-type' => 'info'
    //     ];
    //     return redirect()->back()->with( $notification );

    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Purchase;

class TransactionController extends Controller
{
    public function TransactionAdd(){
        $paymentMethod = PaymentMethod::all();
        $supplier = Supplier::latest()->get();
        $customer = Customer::latest()->get();
        $transaction = Transaction::latest()->get();
        return view('pos.transaction.transaction_add',compact('paymentMethod','supplier','customer','transaction'));
    }//
    // public function TransactionView(){
    //     return view('pos.transaction.transaction_view');
    // }
    public function getDataForAccountId(Request $request)
    {
        $accountId = $request->input('id');
        $account_type = $request->input('account_type');
        //dd($accountId);
        if($account_type == "supplier"){
            $info = Supplier::findOrFail($accountId);
            $count = Purchase::where('supplier_id',$accountId)->where('due', '>' ,0)->count();
        }
        else{
            $info = Customer::findOrFail($accountId);
            $count = Purchase::where('supplier_id',$accountId)->where('due', '>' ,0)->count();
        }
        return response()->json([
            "info" =>$info,
            "count" => $count
        ]);
    }// End function
    public function TransactionStore(Request $request){
        if($request->account_type == 'supplier') {
            $supplier = Supplier::findOrFail($request->account_id);
            $currentBalance = $supplier->wallet_balance;
            $newBalance = $currentBalance ?? 0 + $request->amount;
            $tracBalance = Transaction::where('supplier_id', $supplier->id)->latest()->first();
            $newTraBalance = $tracBalance->balance ?? 0 + $request->amount;
            $transaction = Transaction::create([
                'date' => $request->date,
                'transaction_type' => $request->transaction_type,
                'debit' => $request->amount,
                'payment_method' => $request->payment_method,
                'balance' => $newTraBalance,
                'note' => $request->note,
                'supplier_id' => $request->account_id
            ]);
            $supplier->update(['wallet_balance' => $newBalance]);
        } elseif ($request->account_type == 'customer') {
            $customer = Customer::findOrFail($request->account_id);
            $currentBalance = $customer->wallet_balance;
            $newBalance = $currentBalance + $request->amount;
            $tracsBalance = Transaction::where('customer_id', $customer->id)->latest()->first();
            $newTrasBalance = $tracsBalance->balance ?? 0 + $request->amount;
            $transaction = Transaction::create([
                'date' => $request->date,
                'transaction_type' => $request->transaction_type,
                'debit' => $request->amount,
                'payment_method' => $request->payment_method,
                'note' => $request->note,
                'balance' => $newTrasBalance,
                'customer_id' => $request->account_id
            ]);
            $customer->update(['wallet_balance' => $newBalance]);
        }
        $notification = [
            'message' => 'Transaction Payment Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification );
    }//
    public function TransactionDelete($id){
        Transaction::find($id)->delete();
        $notification = [
           'message' => 'Transaction Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification );
    }//

    
}

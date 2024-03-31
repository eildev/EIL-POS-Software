<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Bank;
use Validator;
use Illuminate\Support\Facades\Auth;
class ExpenseController extends Controller
{
    public function ExpenseCategoryStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        $expenseCategory = new ExpenseCategory;
        if ($validator->passes()) {
            $expenseCategory->name =  $request->name;
            $expenseCategory->save();
            return response()->json([
               'status' => 200,
               'message' => "Expense Category Added Successfully"
            ]);
        }

    }
    public function ExpenseAdd(){
        $bank = Bank::latest()->get();
        $expenseCategory = ExpenseCategory::latest()->get();
        return view('pos.expense.add_expanse',compact('expenseCategory','bank'));
    }
}

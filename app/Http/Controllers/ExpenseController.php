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
    public function ExpenseCategoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ],[
            'name' => 'required Expense Category Name'
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
    } //End Method
    public function ExpenseAdd()
    {
        $bank = Bank::latest()->get();
        $expenseCategory = ExpenseCategory::latest()->get();
        return view('pos.expense.add_expanse', compact('expenseCategory', 'bank'));
    } //
    public function ExpenseStore(Request $request)
    {
        $request->validate([
            'expense_category_id' => 'required',
        ]);
        $expense = new Expense;
        $expense->branch_id =  Auth::user()->branch_id;
        $expense->expense_date =  $request->expense_date;
        $expense->expense_category_id =  $request->expense_category_id;
        $expense->amount =  $request->amount;
        $expense->purpose =  $request->purpose;
        $expense->spender =  $request->spender;
        $expense->bank_account_id =  $request->bank_account_id;
        $expense->note =  $request->note;
        $expense->save();
        $notification = [
            'message' => 'Expense Added Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('expense.view')->with($notification);
    } //
    public function ExpenseView()
    {
        $expenseCat = ExpenseCategory::latest()->get();
        // $expenseCategory  = ExpenseCategory::latest()->get();
        $expense = Expense::latest()->get();
        return view('pos.expense.view_expense', compact('expense', 'expenseCat'));
    } //

    public function ExpenseEdit($id)
    {
        $expense = Expense::find($id);
        $bank = Bank::latest()->get();
        $expenseCategory = ExpenseCategory::latest()->get();
        return view('pos.expense.edit_expense', compact('expense', 'expenseCategory', 'bank'));
    } //
    public function ExpenseUpdate(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->branch_id =  Auth::user()->branch_id;
        $expense->expense_date =  $request->expense_date;
        $expense->expense_category_id =  $request->expense_category_id;
        $expense->amount =  $request->amount;
        $expense->purpose =  $request->purpose;
        $expense->spender =  $request->spender;
        $expense->bank_account_id =  $request->bank_account_id;
        $expense->note =  $request->note;
        $expense->save();
        $notification = [
            'message' => 'Expense Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('expense.view')->with($notification);
    } //
    public function ExpenseDelete($id)
    {

        $expense = Expense::findOrFail($id);
        $expense->delete();
        $notification = [
            'message' => 'Expense Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('expense.view')->with($notification);
    } //
    public function ExpenseCategoryDelete($id)
    {
        $expenseCategory = ExpenseCategory::find($id);
        $expenseCategory->delete();
        $notification = [
            'message' => 'Expense Category Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('expense.view')->with($notification);
    } //
    public function ExpenseCategoryEdit($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    } //
    public function ExpenseCategoryUpdate(Request $request, $id)
    {

        $category = ExpenseCategory::findOrFail($id)->update([
            'name' => $request->name
        ]);
        // dd($category);
        // Return success response
        return response()->json([
            'status' => 200,
            'message' => 'Expense Category updated successfully',
        ]);
    }//
    ///Expense Filter view
    public function ExpenseFilterView(Request $request){
        $expenseCat = ExpenseCategory::latest()->get();
        // $expenseCategory  = ExpenseCategory::latest()->get();
        $expense = Expense::when($request->filterCtegory, function ($query) use ($request) {
            return $query->where('expense_category_id', $request->filterCtegory);
        })
        ->when($request->fromDate && $request->toDate, function ($query) use ($request) {
            return $query->whereBetween('expense_date', [$request->fromDate, $request->toDate]);
        })
        ->get();

        return view('pos.expense.expense-filter-rander-table', compact('expense', 'expenseCat'))->render();
    }
}

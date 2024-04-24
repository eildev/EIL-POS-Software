<?php

namespace App\Http\Controllers;
use App\Models\EmployeeSalary;
use App\Models\Employee;
use App\Models\Branch;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
public function EmployeeSalaryAdd(){
    $employees = Employee::latest()->get();
    $branch = Branch::latest()->get();
    return view('pos.employee_salary.add_employee_salary',compact('employees','branch'));
}//
public function EmployeeSalaryStore(){
    $employeeSalary = new EmployeeSalary;
    $employeeSalary->employee_id = request('employee_id');
    $employeeSalary->branch_id = request('branch_id');
    $requiestDebit=  $employeeSalary->debit = request('debit');
    $employeeSalary->date = request('date');
    $employee = Employee::findOrFail(request('employee_id'));
    $employeeSalary->creadit = $employee->salary;
    $employeeSalary->balance = $employee->salary - $requiestDebit;
    $employeeSalary->note = request('note');
    $employeeSalary->save();
    $notification = array(
        'message' =>'Employee Salary Send Successfully',
         'alert-type'=> 'info'
     );
    return redirect()->back()->with($notification);
}
//
public function EmployeeSalaryView(){
    $employeSalary = EmployeeSalary::all();
    return view('pos.employee_salary.view_employee_salary',compact('employeSalary'));
}//
public function EmployeeSalaryEdit($id){
    $employeeSalary = EmployeeSalary::findOrFail($id);
    $employees = Employee::latest()->get();
    $branch = Branch::latest()->get();
    return view('pos.employee_salary.edit_employee_salary',compact('employeeSalary','employees','branch'));
}//EmployeeSalaryEdit
public function EmployeeSalaryUpdate(Request $request,$id){
    dd($request->all());
    $employeeSalary = EmployeeSalary::findOrFail($id);
    $employeeSalary->employee_id = $request->employee_id;
    $employeeSalary->branch_id = $request->branch_id;
    $requiestDebit=  $employeeSalary->debit + $request->debit;
    $employeeSalary->date =  $request->date;
    $employee = Employee::findOrFail($request->employee_id);
    $employeeSalary->creadit = $employee->salary;
    $employeeSalary->balance = $employee->salary - $requiestDebit;
    $employeeSalary->note  = $request->note;
    $employeeSalary->save();
    $notification = array(
       'message' =>'Employee Salary Update Successfully',
        'alert-type'=> 'info'
    );
    return redirect()->route('employee.salary.view')->with($notification);

}//
public function EmployeeSalaryDelete($id){
    EmployeeSalary::findOrFail($id)->delete();
    $notification = array(
       'message' =>'Employee Salary Deleted Successfully',
        'alert-type'=> 'info'
    );
    return redirect()->route('employee.salary.view')->with($notification);
}
}

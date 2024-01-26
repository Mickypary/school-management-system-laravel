<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\StudentDiscount;
use App\Models\FeeCategoryAmount;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentGroup;
use App\Models\ExamType;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryView()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function EmployeeSalaryIncrement($employee_id)
    {
        $data['editData'] = User::find($employee_id);
        return view('backend.employee.employee_salary.employee_salary_increment', $data);

    }

    public function StoreSalaryIncrement(Request $request, $employee_id)
    {
        $user = User::find($employee_id);
        $previous_salary = $user->salary;
        $present_salary = floatval($previous_salary) + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();


        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $employee_id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->effected_salary_date = date('Y-m-d', strtotime($request->effected_salary_date));
        $salaryData->save();

        $notification = array(
                'message' => 'Employee Salary Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.salary.view')->with($notification);
    }

    public function SalaryDetails($employee_id)
    {
        $data['details'] = User::find($employee_id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();
        // dd($data['details']);
         return view('backend.employee.employee_salary.employee_salary_details', $data);
    }





} // End class

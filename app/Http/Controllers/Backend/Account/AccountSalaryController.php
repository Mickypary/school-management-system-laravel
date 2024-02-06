<?php

namespace App\Http\Controllers\Backend\Account;

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
use App\Models\EmployeeAttendance;

use App\Models\AccountEmployeeSalary;


use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AccountSalaryController extends Controller
{
    public function AccountEmpSalaryView()
    {
        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.employee_salary.employee_salary_view', $data);
    }

    public function AccountEmpSalaryAdd()
    {
        return view('backend.account.employee_salary.employee_salary_add');
    }

    public function AccountEmpSalaryStore(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountEmployeeSalary::where('date',$date)->delete();

        //check if checkbox is ticked
        $checkdata = $request->checkmanage;

        if ($checkdata != null) {
            for ($i=0; $i < count($checkdata) ; $i++) { 
                $data = new AccountEmployeeSalary();
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->date = $date;
                $data->amount = $request->amount[$i]; // or $request->amount[$checkdata[$i]]
                $data->save();
            }
        }

        if (!empty(@$data) || !empty($checkdata)) {
            
            $notification = array(
                'message' => 'Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('account.employee.salary.view')->with($notification);
        }else {

            $notification = array(
                'message' => 'Sorry! Data not saved' ,
                'alert-type' => 'error', 
            );

            return redirect()->back()->with($notification);
        }
    }


} // End Class

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

use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeLeaveController extends Controller
{
    public function LeaveView()
    {
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee_leave.leave_view', $data);
    }

    public function LeaveAdd()
    {
        $data['employee'] = User::where('usertype','Employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.leave_add', $data);
    }

    public function LeaveStore(Request $request)
    {
        if ($request->leave_purpose_id == '0') {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else {
            $leave_purpose_id = $request->leave_purpose_id;
        }

            $employeeleave = new EmployeeLeave();
            $employeeleave->employee_id = $request->employee_id;
            $employeeleave->leave_purpose_id = $leave_purpose_id;
            $employeeleave->start_date = date('Y-m-d', strtotime($request->start_date));
            $employeeleave->end_date = date('Y-m-d', strtotime($request->end_date));
            $employeeleave->save();

        $notification = array(
                'message' => 'Employee Leave Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.leave.view')->with($notification);
    }

    public function LeaveEdit($id)
    {
        $data['employee'] = User::where('usertype','Employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        $data['editData'] = EmployeeLeave::find($id);
        return view('backend.employee.employee_leave.leave_edit', $data);
    }

    public function LeaveUpdate(Request $request, $id)
    {
        if ($request->leave_purpose_id == '0') {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else {
            $leave_purpose_id = $request->leave_purpose_id;
        }

            $employeeleave = EmployeeLeave::find($id);
            $employeeleave->employee_id = $request->employee_id;
            $employeeleave->leave_purpose_id = $leave_purpose_id;
            $employeeleave->start_date = date('Y-m-d', strtotime($request->start_date));
            $employeeleave->end_date = date('Y-m-d', strtotime($request->end_date));
            $employeeleave->save();

        $notification = array(
                'message' => 'Employee Leave Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.leave.view')->with($notification);
    }

    public function LeaveDelete($id)
    {
        EmployeeLeave::find($id)->delete();
        $notification = array(
            'message' => 'Leave Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('employee.leave.view')->with($notification);
    }



} // End Class

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
use App\Models\EmployeeAttendance;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeAttendanceController extends Controller
{
    public function AttendanceView()
    {
        // $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.attendance_view', $data);
    }

    public function AttendanceAdd()
    {
        $data['employee'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_attendance.attendance_add', $data);
    }

    public function AttendanceStore(Request $request)
    {   
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        if ($countemployee != null) {
            for ($i=0; $i < $countemployee; $i++) { 
                $attendance_status = 'attendance_status'.$i;
                $attend = new EmployeeAttendance();
                $attend->date = date('Y-m-d',strtotime($request->date));
                $attend->employee_id = $request->employee_id[$i];
                $attend->attendance_status = $request->$attendance_status;
                $attend->save();
            }
        }

        $notification = array(
                'message' => 'Employee Attendance Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.attendance.view')->with($notification);
    }

    public function AttendanceEdit($date)
    {
        $data['employee'] = User::where('usertype', 'Employee')->get();
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.attendance_edit', $data);
    }

    public function AttendanceDetails($date)
    {
        $data['detailsData'] = EmployeeAttendance::where('date',$date)->orderBy('id','desc')->get();
        return view('backend.employee.employee_attendance.attendance_details', $data);
    }

    public function AttendanceDelete($date)
    {
        EmployeeAttendance::where('date',date('Y-m-d', strtotime($date)))->delete();
        $notification = array(
                'message' => 'Employee Attendance Deleted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.attendance.view')->with($notification);
    }


} // End Class

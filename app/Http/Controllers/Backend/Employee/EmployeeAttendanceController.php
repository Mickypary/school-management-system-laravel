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
        $data['allData'] = EmployeeAttendance::orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.attendance_view', $data);
    }

    public function AttendanceAdd()
    {
        $data['employee'] = User::where('usertype', 'Employee')->get();
        $data['allData'] = EmployeeAttendance::all();
        return view('backend.employee.employee_attendance.attendance_add', $data);
    }

    public function AttendanceStore(Request $request)
    {
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
                'message' => 'Employee Attendance Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.attendance.view')->with($notification);
    }


} // End Class

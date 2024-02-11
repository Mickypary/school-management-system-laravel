<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeAttendance;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceReportController extends Controller
{
    public function AttendReportView()
    {
        $data['employees'] = User::where('usertype','Employee')->get();

        return view('backend.report.attend_report.attend_report_view', $data);
    }

    public function AttendReportGet(Request $request)
    {
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id',$employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date','like',$date.'%'];
        }

        $checkAttendance = EmployeeAttendance::with(['user'])->where($where)->get();
        if ($checkAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            // dd($data['allData']->toArray()); //  dump and die

            $data['absent_count'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status','Absent')->get()->count();

            $data['leave_count'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status','Leave')->get()->count();

            $data['present_count'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status','Present')->get()->count();

            $data['month'] = date('F-Y', strtotime($request->date));

            $pdf = Pdf::loadView('backend.report.attend_report.attend_report_pdf', $data);
            return $pdf->stream('employee_attendance.pdf');
        }else {
            $notification = array(
                'message' => 'Sorry! no record found' ,
                'alert-type' => 'error', 
            );

            return redirect()->back()->with($notification);
        }

        
    }





} // End Class

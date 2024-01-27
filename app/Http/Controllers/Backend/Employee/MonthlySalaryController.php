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
use App\Models\EmployeeAttendance;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlySalaryController extends Controller
{
    public function MonthlySalaryView()
    {
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }

    public function MonthlySalaryGet(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
         }

         $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
         // dd($data->toArray());
         $html  = '<table class="table table-bordered table-striped">';
         $html .= '<tr>';
         $html .= '<th>SL</th>';
         $html .= '<th>ID No</th>';
         $html .= '<th>Employee Name</th>';
         $html .= '<th>Basic Salary</th>';
         $html .= '<th>No of absents</th>';
         $html .= '<th>Salary for this month</th>';    
         $html .= '<th>Action</th>';
         $html .= '</tr>';


         foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->where('attendance_status','Absent')->get();
            $absentcount = count($totalattend);
            $color = 'success';
            $html .= '<tr>';
            $html .= '<td>'.($key+1).'</td>';
            $html .= '<td>'.$attend['user']['id_no'].'</td>';
            $html .= '<td>'.$attend['user']['name'].'</td>';
            $html .= '<td>'.$attend['user']['salary'].'</td>';
            $html .= '<td>'.$absentcount.'</td>';

            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

            $html .='<td>'.$totalsalary.'$'.'</td>';
            $html .='<td>';
            $html .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip", [$attend->employee_id, $request->date]).'">Pay Slip</a>';
            $html .= '</td>';
            $html .= '</tr>';
            // $html .= '</table>';

         }  
        return response()->json(@$html);
    }

    public function MonthlySalaryPayslip(Request $request, $employee_id, $attend_date)
    {
        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();
        $date = date('Y-m', strtotime($attend_date));
         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
         }
        
        $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();
        // dd($data['details']->toArray());
        $pdf = Pdf::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);
        return $pdf->stream('student.pdf');
    }



} // End Class

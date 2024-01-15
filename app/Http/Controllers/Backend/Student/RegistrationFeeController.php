<?php

namespace App\Http\Controllers\Backend\Student;

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

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationFeeController extends Controller
{
    public function RegFeeView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.reg_fee.reg_fee_view', $data);
    }

    public function RegFeeFilter(Request $request)
    {
        $year_id = $request->year_id;
         $class_id = $request->class_id;
         if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
         }
         if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
         }
         $allStudent = AssignStudent::with(['student','discount'])->where($where)->get();
         // dd($allStudent);
         $html  = '<table class="table table-bordered table-striped">';
         $html .= '<tr>';
         $html .= '<th>SL</th>';
         $html .= '<th>ID No</th>';
         $html .= '<th>Student Name</th>';
         $html .= '<th>Roll No</th>';
         $html .= '<th>Reg Fee</th>';
         $html .= '<th>Discount </th>';
         $html .= '<th>Student Fee </th>';
         $html .= '<th>Action</th>';
         $html .= '</tr>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html .= '<tr>';
            $html .= '<td>'.($key+1).'</td>';
            $html .= '<td>'.$v['student']['id_no'].'</td>';
            $html .= '<td>'.$v['student']['name'].'</td>';
            $html .= '<td>'.$v->roll.'</td>';
            $html .= '<td>'.$registrationfee->amount.'</td>';
            $html .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html .='<td>'.$finalfee.'$'.'</td>';
            $html .='<td>';
            $html .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Fee Slip</a>';
            $html .= '</td>';
            $html .= '</tr>';
            // $html .= '</table>';

         }  
        return response()->json(@$html);
    }

    public function RegFeePayslip(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->class_id;

        $allStudent['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

        $pdf = Pdf::loadView('backend.student.reg_fee.reg_fee_pdf', $allStudent);
        return $pdf->stream('student.pdf');
    }



} // End Class

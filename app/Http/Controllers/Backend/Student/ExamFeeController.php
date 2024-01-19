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
use App\Models\ExamType;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamFeeController extends Controller
{
    public function ExamFeeView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exams'] = ExamType::all();

        return view('backend.student.exam_fee.exam_fee_view', $data);
    }

    public function ExamFeeFilter(Request $request)
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
         $html .= '<th>Exam Fee</th>';
         $html .= '<th>Discount </th>';
         $html .= '<th>Student Fee </th>';
         $html .= '<th>Action</th>';
         $html .= '</tr>';


         foreach ($allStudent as $key => $v) {
            $examfee = FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html .= '<tr>';
            $html .= '<td>'.($key+1).'</td>';
            $html .= '<td>'.$v['student']['id_no'].'</td>';
            $html .= '<td>'.$v['student']['name'].'</td>';
            $html .= '<td>'.$v->roll.'</td>';
            $html .= '<td>'.$examfee->amount.'</td>';
            $html .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $examfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html .='<td>'.$finalfee.'$'.'</td>';
            $html .='<td>';
            $html .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_id='.$request->exam_id.'">Fee Slip</a>';
            $html .= '</td>';
            $html .= '</tr>';
            // $html .= '</table>';

         }  
        return response()->json(@$html);
    }

    public function ExamFeePayslip(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $data['exam'] = ExamType::where('id',$request->exam_id)->first()->name;

        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

        $pdf = Pdf::loadView('backend.student.exam_fee.exam_fee_pdf', $data);
        // return $pdf->download('student.pdf');
        return $pdf->stream('student.pdf');
    }





} // End Class

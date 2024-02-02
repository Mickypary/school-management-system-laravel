<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\StudentDiscount;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentGroup;


use App\Models\ExamType;
use App\Models\StudentMarks;
use App\Models\FeeCategoryAmount;
use App\Models\AccountStudentFee;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DefaultController extends Controller
{
    public function GetSubject(Request $request)
    {
        // To retrieve a single row by its id column value, use the find method:
        // $user = DB::table('users')->find(3);
        // DB::table('users')->where('name', 'John')->first();
        $subjects = DB::table('assign_subjects')
            ->leftJoin('subjects', 'assign_subjects.subject_id', '=', 'subjects.id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('assign_subjects.subject_id', 'subjects.name')
            ->where('class_id', $request->class_id)
            ->get();
            // dd($subjects->toArray());
        // $subjects = AssignSubject::with(['school_subject'])->where('class_id', $request->class_id)->get();
        // dd($subjects->toArray());
        return response()->json(@$subjects);
    }

    public function GetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        $allData = AssignStudent::with(['student','student_mark'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
        // dd($allData);

        return response()->json($allData);
    }

    public function MarksEditGetStudent(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        $editData = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
        return response()->json($editData);
    }

    public function GetStudentFee(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));   

        $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
         // dd($data->toArray());
         $html  = '<table class="table table-bordered table-striped">';
         $html .= '<tr>';
         $html .= '<th>SL</th>';
         $html .= '<th>ID No</th>';
         $html .= '<th>Student Name</th>';
         $html .= '<th>Original Fee</th>';
         $html .= '<th>Discount Amount</th>';
         $html .= '<th>Fee (This Student)</th>';    
         $html .= '<th>Select</th>';
         $html .= '</tr>';


         foreach ($data as $key => $std) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();

            $accountstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();

            if($accountstudentfees !=null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }           

            $color = 'success';
            $html .= '<tr>';
            $html .= '<td>'.($key+1).'</td>';
            $html .= '<td>'.$std['student']['id_no'].'<input type="hidden" name="fee_category_id" value= "'.$fee_category_id.' " >'.'<input type="hidden" name="class_id" value="'.$std->class_id .'" >'.'</td>';
            $html .= '<td>'.$std['student']['name'].'<input type="hidden" name="year_id" value= " '.$std->year_id.' " >'.'</td>';
            $html .= '<td>'.$registrationfee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';
            $html .= '<td>'.$std['discount']['discount'].'%'.'</td>';

            
            $originalfee = $registrationfee->amount;
             $discount = $std['discount']['discount'];
             $discountablefee = $discount/100*$originalfee;
             $finalfee = (int)$originalfee-(int)$discountablefee;  

            $html .= '<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
            $html .= '<td><div>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.'  style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</div</td>'; 
            $html .= '</tr>';
            // $html .= '</table>';
         }  
        return response()->json(@$html);





        // For Handlebar JS
//          $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
         
//          $html['thsource']  = '<th>ID No</th>';
//          $html['thsource'] .= '<th>Student Name</th>';
//          $html['thsource'] .= '<th>Father Name</th>';
//          $html['thsource'] .= '<th>Original Fee </th>';
//          $html['thsource'] .= '<th>Discount Amount</th>';
//          $html['thsource'] .= '<th>Fee (This Student)</th>';
//          $html['thsource'] .= '<th>Select</th>';



//           foreach ($data as $key => $std) {
// $registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();

// $accountstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();

// if($accountstudentfees !=null) {
//     $checked = 'checked';
//  }else{
//     $checked = '';
//  }           
//     $color = 'success';
//     $html[$key]['tdsource']  = '<td>'.$std['student']['id_no']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';

//     $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. '<input type="hidden" name="year_id" value= " '.$std->year_id.' " >'.'</td>';

//     $html[$key]['tdsource']  .= '<td>'.$std['student']['fname']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';

//     $html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

//     $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';
  
//      $orginalfee = $registrationfee->amount;
//      $discount = $std['discount']['discount'];
//      $discountablefee = $discount/100*$orginalfee;
//      $finalfee = (int)$orginalfee-(int)$discountablefee;             

//     $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
     
//     $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

//          }  
//         return response()->json(@$html);
    }



} // End Class

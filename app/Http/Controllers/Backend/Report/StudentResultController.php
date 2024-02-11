<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;
use App\Models\MarksGrade;
use PDF;

class StudentResultController extends Controller
{
    public function ResultView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        $data['students'] = User::where('usertype','Student')->get();

        return view('backend.report.student_result.student_result_view', $data);
    }

    public function ResultGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $student_id = $request->student_id;

        $checkResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('student_id',$student_id)->first();
        // dd($checkResult);
        if ($checkResult) {         
            
                
            $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id','marks')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('student_id',$checkResult->student_id)->get();
            // dd($data['allData']->toArray());

            $data['allGrades'] = MarksGrade::all();

            $pdf = Pdf::loadView('backend.report.student_result.student_result_pdf', $data);
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

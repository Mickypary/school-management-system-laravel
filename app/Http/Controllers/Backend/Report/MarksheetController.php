<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;

class MarksheetController extends Controller
{
    public function MarksheetView()
    {
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.marksheet.marksheet_view', $data);
    }

    public function MarkSheetget(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<', '33')->get()->count();
        // dd($count_fail);
        $singlestudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

        if ($singlestudent ==  true) {
            $allMarks = StudentMarks::with(['assign_subject'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
            // dd($allMarks->toArray());

            $allGrades = MarksGrade::all();

            return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades','count_fail'));
        }else {
            $notification = array(
                'message' => 'Sorry! this criteria does not match' ,
                'alert-type' => 'error', 
            );

            return redirect()->back()->with($notification);
        }

    } // End Method



} // End Class

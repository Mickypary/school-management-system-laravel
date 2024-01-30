<?php

namespace App\Http\Controllers\Backend\Marks;

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
use App\Models\MarksGrade;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MarksGradeController extends Controller
{
    public function MarksGradeView()
    {
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.marks_grade_view',$data);
    }

    public function MarksGradeAdd()
    {
        return view('backend.marks.marks_grade_add');
    }

    public function MarksGradeStore(Request $request)
    {
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_mark = $request->start_mark;
        $data->end_mark = $request->end_mark;
        $data->start_point = $request->end_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();

        $notification = array(
                'message' => 'Grade Marks Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('marks.grade.view')->with($notification);
    }

    public function MarksGradeEdit($id)
    {
        $data['editData'] = MarksGrade::find($id);
        return view('backend.marks.marks_grade_edit', $data);
    }

    public function MarksGradeUpdate(Request $request,$id)
    {      
        $editData = MarksGrade::find($id);

        $editData->grade_name = $request->grade_name;
        $editData->grade_point = $request->grade_point;
        $editData->start_mark = $request->start_mark;
        $editData->end_mark = $request->end_mark;
        $editData->start_point = $request->end_point;
        $editData->end_point = $request->end_point;
        $editData->remarks = $request->remarks;
        $editData->save();

        $notification = array(
                'message' => 'Grade Marks Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('marks.grade.view')->with($notification);
    }




} // End Class

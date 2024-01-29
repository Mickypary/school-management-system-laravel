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

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MarksController extends Controller
{
    public function MarksAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_add', $data);
    }

    public function MarksStore(Request $request)
    {
        $countstudent = count($request->student_id);
        // dd($countstudent);
        if ($countstudent != null) {
            for ($i=0; $i < $countstudent; $i++) { 
                $savemark = new StudentMarks();
                $savemark->student_id = $request->student_id[$i];
                $savemark->id_no = $request->id_no[$i];
                $savemark->year_id = $request->year_id;
                $savemark->class_id = $request->class_id;
                $savemark->assign_subject_id = $request->assign_subject_id;
                $savemark->exam_type_id = $request->exam_type_id;
                $savemark->marks = $request->marks[$i];
                $savemark->save();

            }

            $notification = array(
                'message' => 'Student Marks Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->back()->with($notification);
        }
    }

    




} // End Class

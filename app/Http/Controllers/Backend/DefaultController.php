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



} // End Class

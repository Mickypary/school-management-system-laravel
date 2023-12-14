<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function StoreExamType(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

       $exam_type = new ExamType();

       $exam_type->name = $request->name;
       $exam_type->save();

       $notification = array(
            'message' => 'Exam Type Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('exam.type.view')->with($notification);
    }



} // End Class

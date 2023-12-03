<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudentClass()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function AddStudentClass()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function StoreStudentClass(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

       $student_class = new StudentClass();

       $student_class->name = $request->name;
       $student_class->save();

       $notification = array(
            'message' => 'Student Class Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.class.view')->with($notification);


    }

    public function StudentClassEdit($id)
    {
        $data['editData'] = StudentClass::findOrFail($id);
        return view('backend.setup.student_class.edit_class', $data);
    }

    public function StudentClassUpdate(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$id,
        ]);
        StudentClass::findOrFail($id)->Update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Class Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.class.view')->with($notification);

    }

    public function StudentClassDelete($id)
    {
        StudentClass::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.class.view')->with($notification);
    }



} // End CLass

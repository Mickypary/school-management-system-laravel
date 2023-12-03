<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function StudentShiftAdd()
    {
        return view('backend.setup.shift.add_shift');
    }

    public function StoreStudentShift(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

       $student_shift = new StudentShift();

       $student_shift->name = $request->name;
       $student_shift->save();

       $notification = array(
            'message' => 'Student Shift Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $editData = StudentShift::findOrFail($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));

    }

    public function StudentShiftUpdate(Request $request,$id)
    {
        $data = StudentShift::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id,
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        StudentShift::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.shift.view')->with($notification);
    }



} // End Class

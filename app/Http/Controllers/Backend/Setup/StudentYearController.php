<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function AddYear()
    {
        return view('backend.setup.year.add_year');
    }

    public function StoreStudentYear(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

       $student_year = new StudentYear();

       $student_year->name = $request->name;
       $student_year->save();

       $notification = array(
            'message' => 'Academic Year Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function YearEdit($id)
    {
        $editData = StudentYear::findOrFail($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }

    public function YearUpdate(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name' => 'required|unique:student_years,name,'.$id,
        ]);
        StudentYear::findOrFail($id)->Update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Academic Year Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function YearDelete($id)
    {
        StudentYear::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Academic Year Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.year.view')->with($notification);
    }


} // End Class

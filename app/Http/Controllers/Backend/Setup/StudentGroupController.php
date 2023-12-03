<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function AddGroup()
    {
        return view('backend.setup.group.add_group');
    }

    public function StoreStudentGroup(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

       $student_group = new StudentGroup();

       $student_group->name = $request->name;
       $student_group->save();

       $notification = array(
            'message' => 'Student Group Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $editData = StudentGroup::findOrFail($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id,
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        StudentGroup::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('student.group.view')->with($notification);
    }




} // End Class

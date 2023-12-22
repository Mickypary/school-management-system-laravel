<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function ViewSubject()
    {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view_subject', $data);
    }

    public function SubjectAdd()
    {
        return view('backend.setup.subject.add_subject');
    }

    public function StoreSubject(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);

       $subject = new Subject();

       $subject->name = $request->name;
       $subject->save();

       $notification = array(
            'message' => 'Subject Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectEdit($id)
    {
        $data['editData'] = Subject::findOrFail($id);
        return view('backend.setup.subject.edit_subject', $data);
    }

    public function SubjectUpdate(Request $request, $id)
    {
        $data = Subject::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:subjects,name,'.$data->id,
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function SubjectDelete($id)
    {
        Subject::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subject Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('subject.view')->with($notification);
    }



} // End class

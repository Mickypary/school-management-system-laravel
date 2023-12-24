<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function AddDesignation()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesignation(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

       $subject = new Designation();

       $subject->name = $request->name;
       $subject->save();

       $notification = array(
            'message' => 'Designation Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DesignationEdit($id)
    {
        $data['editData'] = Designation::findOrFail($id);
        return view('backend.setup.designation.edit_designation', $data);
    }

    public function DesignationUpdate(Request $request, $id)
    {
        $data = Designation::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id,
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DesignationDelete($id)
    {
        Designation::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('designation.view')->with($notification);
    }


} // End class

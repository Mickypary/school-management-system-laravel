<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\Subject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
        $data['allData'] = AssignSubject::all();
        // $data['allData'] = AssignSubject::select('subject_id')->groupBy('subject_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AddAssignSubject()
    {
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }


} // End Class

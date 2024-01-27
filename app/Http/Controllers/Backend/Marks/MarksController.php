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

    




} // End Class

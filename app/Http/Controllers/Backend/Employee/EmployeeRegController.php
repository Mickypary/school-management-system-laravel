<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\StudentDiscount;
use App\Models\FeeCategoryAmount;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentGroup;
use App\Models\ExamType;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeRegController extends Controller
{
    public function EmployeeView()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_reg.employee_view', $data);
    }

    public function EmployeeAdd()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_add', $data);
    }




} // End class

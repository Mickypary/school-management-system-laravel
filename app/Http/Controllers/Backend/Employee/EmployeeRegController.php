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

    public function EmployeeStore(Request $request)
    {
        $validate =  $request->validate([
            'name' => 'required',
        ]);

       DB::transaction(function () use($request) {
            $checkyear = date('Ym', strtotime($request->join_date));
            $employee = User::where('usertype', 'Employee')->orderBy('id','DESC')->first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            }else {

                $employee_id = User::where('usertype', 'Employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee_id+1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00' . $studentId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }

            } /*End Else*/

            $final_id_no = 'GVS' . $checkyear.$id_no;

            $user = new User();
            $user->id_no = $final_id_no;
            $code = rand(0000,9999);
            $user->code = $code;
            $user->name = $request->name;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->email = $request->email;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;

            $file = $request->file('image');
            if ($file) {
                $filename = date('YmdHi').'.'.$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user->image = $filename;

            }

            $user->save();


            // Store Employee salary info in DB
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->effected_salary_date = date('Y-m-d', strtotime($request->effected_salary_date));
            $employee_salary->increment_salary = "0";

            $employee_salary->save();


       }); /*End DB Transactional*/

            $notification = array(
                'message' => 'Employee Registration Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.registration.view')->with($notification);
    }


    public function EmployeeEdit($employee_id)
    {

        $data['designation'] = Designation::all();
        // $data['editData'] = User::where('id', $employee_id)->first();
        $data['editData'] = User::find($employee_id);
        // dd($data['editData']->toArray());
        return view('backend.employee.employee_reg.employee_edit', $data);
    }

    public function EmployeeUpdate(Request $request, $employee_id)
    {
        $validate =  $request->validate([
            'name' => 'required',
        ]);

            $user = User::find($employee_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;

            $file = $request->file('image');
            if ($file) {
                @unlink(public_path('upload/employee_images/'.$user->image));
                $filename = date('YmdHi').'.'.$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user->image = $filename;

            }

            $user->save();


            $notification = array(
                'message' => 'Employee Registration Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('employee.registration.view')->with($notification);
    }




} // End class

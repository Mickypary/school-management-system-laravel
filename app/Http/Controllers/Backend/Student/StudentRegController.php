<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\StudentDiscount;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentGroup;

use DB;

class StudentRegController extends Controller
{
    public function StudentRegView()
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($data['year_id']);      
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentClassYearFilter(Request $request)
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        // dd($data['class_id']);      
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentRegAdd()
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['shifts'] = StudentShift::all();
        $data['groups'] = StudentGroup::all();
        return view('backend.student.student_reg.student_add', $data);
    }

    public function StoreStudentReg(Request $request)
    {
       $validate =  $request->validate([
            'name' => 'required',
        ]);

       DB::transaction(function () use($request) {
            $checkyear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id','DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            }else {

                $student_id = User::where('usertype', 'Student')->orderBy('id','DESC')->first()->id;
                $studentId = $student_id+1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }

            } /*End Else*/

            $final_id_no = 'GVS' . $checkyear.$id_no;

            $user = new User();
            $user->id_no = $final_id_no;
            $code = rand(0000,9999);
            $user->code = $code;
            $user->name = $request->name;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->email = $request->email;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->father_email = $request->father_email;
            $user->mother_email = $request->mother_email;
            $user->father_mobile = $request->father_mobile;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;

            $file = $request->file('image');
            if ($file) {
                $filename = date('YmdHi').'.'.$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user->image = $filename;

            }

            $user->save();


            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;

            $assign_student->save();


            $discount_student = new StudentDiscount();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = 1;
            $discount_student->discount = $request->discount;

            $discount_student->save();


       }); /*End DB Transactional*/

            $notification = array(
                'message' => 'Student Registration Inserted Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('student.registration.view')->with($notification);


    }

    public function StudentRegEdit($student_id)
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['shifts'] = StudentShift::all();
        $data['groups'] = StudentGroup::all();

        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());
        return view('backend.student.student_reg.student_edit', $data);
    }

    public function StudentRegUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use($request,$student_id) {

        $userData = User::where('id',$student_id)->first();
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->fname = $request->fname;
            $userData->mname = $request->mname;
            $userData->father_email = $request->father_email;
            $userData->mother_email = $request->mother_email;
            $userData->father_mobile = $request->father_mobile;
            $userData->dob = date('Y-m-d', strtotime($request->dob));
            $userData->mobile = $request->mobile;
            $userData->address = $request->address;
            $userData->gender = $request->gender;
            $userData->religion = $request->religion;

            $file = $request->file('image');
            if ($file) {
                @unlink(public_path('upload/student_images/'.$userData->image));
                $filename = date('YmdHi').'.'.$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $userData->image = $filename;

            }

            $userData->save();


            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;

            $assign_student->save();


            $discount_student = StudentDiscount::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;

            $discount_student->save();

        }); /*End DB Transactional*/

            $notification = array(
                'message' => 'Student Registration Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('student.registration.view')->with($notification);
    }



} // End Class

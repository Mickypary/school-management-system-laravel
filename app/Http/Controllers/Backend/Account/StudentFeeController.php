<?php

namespace App\Http\Controllers\Backend\Account;

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
use App\Models\MarksGrade;

use App\Models\AccountStudentFee;
use App\Models\FeeCategory;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentFeeController extends Controller
{
    public function StudentFeeView()
    {
        $data['allData'] = AccountStudentFee::all();
        return view('backend.account.student_fee.student_fee_view', $data);
    }

    public function StudentFeeAdd()
    {
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['fee_category'] = FeeCategory::all();
        return view('backend.account.student_fee.student_fee_add', $data);
    }

    public function StudentFeeStore(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

        //check if checkbox is ticked
        $checkdata = $request->checkmanage;

        if ($checkdata != null) {
            for ($i=0; $i < count($checkdata) ; $i++) { 
                $data = new AccountStudentFee();
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->amount = $request->amount[$i];
                $data->save();
            }
        }

        if (!empty(@$data) || !empty($checkdata)) {
            
            $notification = array(
                'message' => 'Updated Successfully' ,
                'alert-type' => 'success', 
            );

            return redirect()->route('student.fee.view')->with($notification);
        }else {

            $notification = array(
                'message' => 'Sorry! Data not saved' ,
                'alert-type' => 'error', 
            );

            return redirect()->back()->with($notification);
        }

        
    }





} // End Class

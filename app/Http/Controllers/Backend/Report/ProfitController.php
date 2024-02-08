<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountEmployeeSalary;
use App\Models\AccountStudentFee;
use App\Models\OtherAccountCost;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfitController extends Controller
{
    public function MonthlyProfitView()
    {
        return view('backend.report.profit.profit_view');
    }

    public function MonthlyProfitPdf(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['sdate'] = date('Y-m-d', strtotime($request->start_date));
        $data['edate'] = date('Y-m-d', strtotime($request->end_date));
        
        
        // dd($data['details']->toArray());
        $pdf = Pdf::loadView('backend.report.profit.monthly_profit_pdf', $data);
        return $pdf->stream('student.pdf');
    }



} // End Class

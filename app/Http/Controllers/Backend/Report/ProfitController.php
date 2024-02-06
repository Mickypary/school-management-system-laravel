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



} // End Class

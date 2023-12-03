<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    }

    public function FeeCatAdd()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function StoreFeeCategory(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

       $fee_category = new FeeCategory();

       $fee_category->name = $request->name;
       $fee_category->save();

       $notification = array(
            'message' => 'Fee Category Inserted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('fee.category.view')->with($notification);
    }


} // End Class

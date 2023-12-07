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

    public function FeeCatEdit($id)
    {
        $editData = FeeCategory::findOrFail($id);
        return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
    }

    public function FeeCategoryUpdate(Request $request,$id)
    {
        $data = FeeCategory::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id,
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryDelete($id)
    {
        FeeCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Fee category Deleted Successfully' ,
            'alert-type' => 'success', 
        );

        return redirect()->route('fee.category.view')->with($notification);
    }


} // End Class

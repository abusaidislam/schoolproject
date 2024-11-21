<?php

namespace App\Http\Controllers;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    public function index()
    {
        $data = Marketing::orderBy('id','desc')->get();
        return view('admin.marketing.index',compact('data'));
    }
    
    public function destroy($id)
    {
        $Marketing= Marketing::find($id);
        $Marketing->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
    public function MarketingDataStor(Request $request)
    {
        $validatedData = $request->validate([
            'area_id' => 'required',
            'sub_name' => 'required',
            'stu_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'Mobile_no' => 'required|regex:/(01)[0-9]{9}/',
            'parent_name' => 'required|string|max:255',
            'class_name' => 'required',
            'school_name' => 'required',

        ]);

        $data = [
            'area_id' => $request->area_id,
            'sub_name' => $request->sub_name,
            'stu_name' => $request->stu_name,
            'gender' => $request->gender,
            'parent_name' => $request->parent_name,
            'class_name' => $request->class_name,
            'Mobile_no' => $request->Mobile_no,
            'school_name' => $request->school_name,
        ];

        Marketing::create($data);

        return redirect('marketing-form')->with('message', 'Your Data Inserted successfully!!!');
    }
 

}

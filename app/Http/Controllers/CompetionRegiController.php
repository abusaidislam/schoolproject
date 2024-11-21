<?php

namespace App\Http\Controllers;

use App\Models\CompetionRegiManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class CompetionRegiController extends Controller
{
    public function index()
    {
        $data = CompetionRegiManage::orderBy('id','desc')->get();
        return view('admin.competion_regi_info.index',compact('data'));
    }
    public function create()
    {
        return view('admin.competion_regi_info.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_fullName' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'father_contactno' => 'required',
            'mother_name' => 'required',
            'mather_occupation' => 'required',
            'mather_contactno' => 'required',
            'school_enrolled' => 'required',
            'present_address' => 'required',
            'dateofbirth' => 'required',
            'phone_number' => 'required|unique:competion_regi_manages,phone_number', 
            'password' => 'required',
            'class_name' => 'required',
            'student_type' => 'required',
            'transation_id' => 'required',
            'payment' => 'required',
            'condition_name' => 'required',
          
        ]);

        $data = [
            'student_fullName' => $request->student_fullName,
            'gender' => $request->gender,
            'father_name' => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'father_contactno' => $request->father_contactno,
            'mother_name' => $request->mother_name,
            'mather_occupation' => $request->mather_occupation,
            'mather_contactno' => $request->mather_contactno,
            'school_enrolled' => $request->school_enrolled,
            'present_address' => $request->present_address,
            'dateofbirth' => $request->dateofbirth,
            'class_name' => $request->class_name,
            'phone_number' => $request->phone_number,
            'transation_id' => $request->transation_id,
            'password' => Hash::make($request->password),
            'text_password' => $request->password,
            'payment' => $request->payment,
            'student_type' => $request->student_type,
            'level_name' => $request->level_name,
            'condition_name' => $request->condition_name,
            'status' => 'Pending',
        ];

        CompetionRegiManage::create($data);
     
        return redirect('compition-regi-info')->with('massage', 'Your Registration successfully!!!');
    }
    public function edit($id)
    {
        $CompetionRegiManage = CompetionRegiManage::find($id);
        return view('admin.competion_regi_info.edit',compact('CompetionRegiManage'));
    }
    public function update(Request $request, $id)
    {
        $CompetionRegiManage = CompetionRegiManage::find($id);
        $data =
        [
            'student_fullName' => $request->student_fullName,
            'gender' => $request->gender,
            'father_name' => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'father_contactno' => $request->father_contactno,
            'mother_name' => $request->mother_name,
            'mather_occupation' => $request->mather_occupation,
            'mather_contactno' => $request->mather_contactno,
            'school_enrolled' => $request->school_enrolled,
            'present_address' => $request->present_address,
            'dateofbirth' => $request->dateofbirth,
            'class_name' => $request->class_name,
            'phone_number' => $request->phone_number,
            'transation_id' => $request->transation_id,
            'password' => Hash::make($request->password),
            'text_password' => $request->password,
            'payment' => $request->payment,
            'student_type' => $request->student_type,
            'level_name' => $request->level_name,
            'condition_name' => $request->condition_name,
            // 'status' => $request->status,
        ];
        $CompetionRegiManage->update($data);
        return redirect('compition-regi-info')->with('massage', 'Updated successfully!!!');
    }
    public function delete($id)
    {
        $CompetionRegiManage= CompetionRegiManage::find($id);
        $CompetionRegiManage->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }

    public function regiUpdateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:competion_regi_manages,id',
            'status' => 'required|in:Pending,Approved',
        ]);

        $CompetionRegiManage = CompetionRegiManage::find($request->id);
        $CompetionRegiManage->status = $request->status;
        $CompetionRegiManage->save();

        // return response()->json($request->id);
        return response()->json(['success' => true]);
    }

    public function CompetionDataStor(Request $request)
    {
        $validatedData = $request->validate([
            'student_fullName' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'father_contactno' => 'required',
            'mother_name' => 'required',
            'mather_occupation' => 'required',
            'mather_contactno' => 'required',
            'school_enrolled' => 'required',
            'present_address' => 'required',
            'dateofbirth' => 'required',
            'phone_number' => 'required|unique:competion_regi_manages,phone_number', 
            'password' => 'required',
            'class_name' => 'required',
            'student_type' => 'required',
            'transation_id' => 'required',
            'payment' => 'required',
            'condition_name' => 'required',
          
        ]);

        $data = [
            'student_fullName' => $request->student_fullName,
            'gender' => $request->gender,
            'father_name' => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'father_contactno' => $request->father_contactno,
            'mother_name' => $request->mother_name,
            'mather_occupation' => $request->mather_occupation,
            'mather_contactno' => $request->mather_contactno,
            'school_enrolled' => $request->school_enrolled,
            'present_address' => $request->present_address,
            'dateofbirth' => $request->dateofbirth,
            'class_name' => $request->class_name,
            'phone_number' => $request->phone_number,
            'transation_id' => $request->transation_id,
            'password' => Hash::make($request->password),
            'text_password' => $request->password,
            'payment' => $request->payment,
            'student_type' => $request->student_type,
            'level_name' => $request->level_name,
            'condition_name' => $request->condition_name,
            'status' => 'Pending',
        ];

        CompetionRegiManage::create($data);
     
        return redirect('4/1st-abacus-olympaid-2024')->with('message', 'Your Registration successfully!!!');
    }
 
}

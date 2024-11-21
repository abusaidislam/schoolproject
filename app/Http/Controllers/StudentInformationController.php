<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
use App\Models\ClassName;
use App\Models\Country;
use App\Models\Relegion;
use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentInformationController extends Controller
{
    public function pendinglist()
    {
        $studentlist = StudentInformation::where('status', '2')
        ->orderBy('id','asc')->get();
        return view('admin.studentinformation.pending',compact('studentlist'));
    }

    public function UpdateStatus(Request $request)
    {
            $data = StudentInformation::findOrFail($request->id);
            $data->status = $request->status;
            $data->save();
            return response()->json(['message' => 'Status updated successfully']);
        
    }

    public function index()
    {
        $wordlist = StudentInformation::where('status', '2')
            ->get();
        $pendinglist = $wordlist->count();
        $data = StudentInformation::where('status', '1')
        ->orderBy('id','asc')->get();
        return view('admin.studentinformation.index',compact('data','pendinglist'));
    }
    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        $bloodGroup = BloodGroup::orderBy('id','asc')->get();
        $gender = Gender::orderBy('id','asc')->get();
        $relegion = Relegion::orderBy('id','asc')->get();
        $country = Country::orderBy('id','asc')->get();
        $className = ClassName::orderBy('id','asc')->get();
        return view('admin.studentinformation.create', compact('className','country','relegion', 'gender','bloodGroup','activities'));
    }
    public function store(Request $request)
    {
        $image = $request->image;
        $classname = ClassName::find($request->classname)->className;
        $data =
        [
            'classnameId'=>$request->classname,
            'classname'=>$classname,
            'rollno'=>$request->rollno,
            'regno'=>$request->regno,
            'studentname'=>$request->studentname,
            'fathername'=>$request->fathername,
            'gender'=>$request->gender,
            'contactno'=>$request->contactno,
            'presentaddress'=>$request->presentaddress,
            'mothername'=>$request->mothername,
            'dateofbirth'=>$request->dateofbirth,
            'relegion'=>$request->relegion,
            'permanentaddress'=>$request->permanentaddress,
            'bloodgroup'=>$request->bloodgroup,
            'nationality'=>$request->nationality,
            'admissiondate'=>$request->admissiondate,
            'session'=>$request->session,
            'nationalid'=>$request->nationalid,
            'status'=>$request->status,
        ];
        if ($image)
        {
            $imgtext = 'studImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['studentimage'] = $imgtext;
        }
        StudentInformation::create($data);
        return redirect('student_info')->with('massage', 'Inserted successfully!!!');
    }
    public function show(StudentInformation $studentInformation)
    {
        //
    }
    public function edit($id)
    {
        $activities = Activities::orderBy('id','asc')->get();
        $bloodGroup = BloodGroup::orderBy('id','asc')->get();
        $gender = Gender::orderBy('id','asc')->get();
        $relegion = Relegion::orderBy('id','asc')->get();
        $country = Country::orderBy('id','asc')->get();
        $studentInformation = StudentInformation::find($id);
        $className = ClassName::orderBy('id','asc')->get();
        return view('admin.studentinformation.edit',compact('studentInformation','className', 'country','relegion', 'gender','bloodGroup','activities'));
    }
    public function update(Request $request, $id)
    {
        $studentInformation = StudentInformation::find($id);

        $image = $request->image;
        // $classname = ClassName::find($request->classname)->className;
        $data =
        [
            'online_corporate'=>$request->online_corporate,
            'student_fullName'=>$request->student_fullName,
            'gender'=>$request->gender,
            'father_name'=>$request->father_name,
            'father_occupation'=>$request->father_occupation,
            'father_contactno'=>$request->father_contactno,
            'mother_name'=>$request->mother_name,
            'mather_occupation'=>$request->mather_occupation,
            'mather_contactno'=>$request->mather_contactno,
            'contactno'=>$request->contactno,
            'dateofbirth'=>$request->dateofbirth,
            'school_enrolled'=>$request->school_enrolled,
            'presentaddress'=>$request->presentaddress,
            'course'=>$request->course,
            'language'=>$request->language,
            'appropriate_answer'=>$request->appropriate_answer,
            'email'=>$request->email,
            'about'=>$request->about,
            'payment'=>$request->payment,
            'condition_name'=>$request->condition_name,
            'status'=>$request->status,
        ];
        // if ($image)
        // {
        //     $imgtext = 'studImg'. time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('upload/'), $imgtext);
        //     $data['studentimage'] = $imgtext;
        // }
        $studentInformation->update($data);
        return redirect('student_info')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $imageDB = StudentInformation::find($id)->studentimage;
        if($imageDB){
            unlink(public_path('upload/').$imageDB);
        }
        $StudentInformation= StudentInformation::find($id);
        $StudentInformation->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
    public function studantStor(Request $request)
    {
        $validatedData = $request->validate([
            'online_corporate' => 'required',
            'student_fullName' => 'required',
            'gender' => 'required',
            'father_name' => 'required|string|max:255',
            'father_occupation' => 'required',
            'father_contactno' => 'required|regex:/(01)[0-9]{9}/',
            'mother_name' => 'required|string|max:255',
            'mather_occupation' => 'required',
            'mather_contactno' => 'required|regex:/(01)[0-9]{9}/',
            'contactno' => 'required|regex:/(01)[0-9]{9}/',
            'dateofbirth' => 'required',
            'school_enrolled' => 'required',
            'present_address' => 'required',
            'course' => 'required',
            'email' => 'required',
            'about' => 'required',
            'payment' => 'required',
            'appropriate_answer' => 'required',
            'language' => 'required',
            'condition_name' => 'required',

        ]);
        $image = $request->image;
        $data =
        [
            'online_corporate'=>$request->online_corporate,
            'student_fullName'=>$request->student_fullName,
            'gender'=>$request->gender,
            'father_name'=>$request->father_name,
            'father_occupation'=>$request->father_occupation,
            'father_contactno'=>$request->father_contactno,
            'mother_name'=>$request->mother_name,
            'mather_occupation'=>$request->mather_occupation,
            'mather_contactno'=>$request->mather_contactno,
            'contactno'=>$request->contactno,
            'dateofbirth'=>$request->dateofbirth,
            'school_enrolled'=>$request->school_enrolled,
            'presentaddress'=>$request->present_address,
            'course'=>$request->course,
            'language'=>$request->language,
            'appropriate_answer'=>$request->appropriate_answer,
            'email'=>$request->email,
            'about'=>$request->about,
            'payment'=>$request->payment,
            'condition_name'=>$request->condition_name,
            'status'=>'2',
        ];


        // if ($image)
        // {
        //     $imgtext = 'studImg'. time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('upload/'), $imgtext);
        //     $data['studentimage'] = $imgtext;
        // }
        StudentInformation::create($data);
        return redirect()->back()->with('message', 'Form Submitted Successfully.');
        
        // $result = StudentInformation::create($data);
        // if($result)
        // {
        //     $msg = 'Message sent Successfully!';
        // }else{
        //     $msg = 'Message Send faild';
        // }
        // return response()->json(['success'=>$msg]);
    }
    public function MarketingDataStor(Request $request)
    {
        $image = $request->image;
        $data =
        [
            'online_corporate'=>$request->online_corporate,
            'student_fullName'=>$request->student_fullName,
            'gender'=>$request->gender,
            'father_name'=>$request->father_name,
            'father_occupation'=>$request->father_occupation,
            'father_contactno'=>$request->father_contactno,
            'mother_name'=>$request->mother_name,
            'mather_occupation'=>$request->mather_occupation,
            'mather_contactno'=>$request->mather_contactno,
            'contactno'=>$request->contactno,
            'dateofbirth'=>$request->dateofbirth,
            'school_enrolled'=>$request->school_enrolled,
            'presentaddress'=>$request->present_address,
            'course'=>$request->course,
            'language'=>$request->language,
            'appropriate_answer'=>$request->appropriate_answer,
            'email'=>$request->email,
            'about'=>$request->about,
            'payment'=>$request->payment,
            'condition_name'=>$request->condition_name,
            'status'=>'2',
        ];


        // if ($image)
        // {
        //     $imgtext = 'studImg'. time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('upload/'), $imgtext);
        //     $data['studentimage'] = $imgtext;
        // }
        StudentInformation::create($data);
        return redirect()->back()->with('message', 'Inserted successfully!!!');
        
        // $result = StudentInformation::create($data);
        // if($result)
        // {
        //     $msg = 'Message sent Successfully!';
        // }else{
        //     $msg = 'Message Send faild';
        // }
        // return response()->json(['success'=>$msg]);
    }
}

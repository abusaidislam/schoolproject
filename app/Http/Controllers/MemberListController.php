<?php

namespace App\Http\Controllers;
use App\Models\MemberList;
use App\Models\MemberCategory;
use App\Models\Activities;
use App\Models\BloodGroup;
use App\Models\Gender;
use App\Models\Relegion;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MemberListController extends Controller
{
    public function index()
    {

        $data = MemberList::orderBy('id','desc')->get();
        return view('admin.memberList.index',compact('data'));
    }

    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        $bloodGroup = BloodGroup::orderBy('id','asc')->get();
        $gender = Gender::orderBy('id','asc')->get();
        $relegion = Relegion::orderBy('id','asc')->get();
        $country = Country::orderBy('id','asc')->get();
        $content = MemberCategory::orderBy('id','asc')->get();
        return view('admin.memberList.create',compact('content','country','relegion', 'gender','bloodGroup','activities'));
    }

    public function store(Request $request)
    {
        $image = $request->image;
        $cv_upload = $request->cv_upload;

        $data =
        [
            'teachername'=>$request->teachername,
            'designation'=>$request->designation,
            'eduqualification'=>$request->eduqualification,
            'fathername'=>$request->fathername,
            'mothername'=>$request->mothername,
            'presentaddress'=>$request->presentaddress,
            'joiningdate'=>$request->joiningdate,
            'gender'=>$request->gender,
            'relegion'=>$request->relegion,
            'contactno'=>$request->contactno,
            'dateofbirth'=>$request->dateofbirth,
            'status'=>$request->status,
            'subject'=>$request->subject,
            'permanentaddress'=>$request->permanentaddress,
            'promotiondate'=>$request->promotiondate,
            'bloodgroup'=>$request->bloodgroup,
            'nationalid'=>$request->nationalid,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'fb_link'=>$request->fb_link,
            'tw_link'=>$request->tw_link,
            'lin_link'=>$request->lin_link,
            'ins_link'=>$request->ins_link,
        ];

        if ($image)
        {
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        if ($cv_upload) {
            $allowedMimeTypes = ['application/pdf'];
            $cvMimeType = $cv_upload->getClientMimeType();

            if (in_array($cvMimeType, $allowedMimeTypes)) {
                $cv_uploadfile = time().'.'.$cv_upload->getClientOriginalExtension();
                $cv_upload->move(public_path('upload/'), $cv_uploadfile);
                $data['cv_upload'] = $cv_uploadfile;
            } else {
                // Handle invalid MIME type error
                return back()->with('error', 'Invalid file format. Please upload a PDF file.');
            }
        }

        MemberList::create($data);
        return redirect('teacher_list')->with('massage', 'Inserted successfully!!!');
    }

    public function edit(MemberList $teacher_list)
    {
        $activities = Activities::orderBy('id','asc')->get();
        $bloodGroup = BloodGroup::orderBy('id','asc')->get();
        $gender = Gender::orderBy('id','asc')->get();
        $relegion = Relegion::orderBy('id','asc')->get();
        $country = Country::orderBy('id','asc')->get();
        $content = MemberCategory::orderBy('id','desc')->get();
        return view('admin.memberList.edit',compact('content','teacher_list','country','relegion', 'gender','bloodGroup','activities'));
    }


    public function update(Request $request, MemberList $teacher_list)
    {
        $image = $request->image;
        $cv_upload = $request->cv_upload;

        $data =
        [
            'teachername'=>$request->teachername,
            'designation'=>$request->designation,
            'eduqualification'=>$request->eduqualification,
            'fathername'=>$request->fathername,
            'mothername'=>$request->mothername,
            'presentaddress'=>$request->presentaddress,
            'joiningdate'=>$request->joiningdate,
            'gender'=>$request->gender,
            'relegion'=>$request->relegion,
            'contactno'=>$request->contactno,
            'dateofbirth'=>$request->dateofbirth,
            'status'=>$request->status,
            'subject'=>$request->subject,
            'permanentaddress'=>$request->permanentaddress,
            'promotiondate'=>$request->promotiondate,
            'bloodgroup'=>$request->bloodgroup,
            'nationalid'=>$request->nationalid,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'fb_link'=>$request->fb_link,
            'tw_link'=>$request->tw_link,
            'lin_link'=>$request->lin_link,
            'ins_link'=>$request->ins_link,
        ];
        if ($image)
        {
            $imageDB = $teacher_list->image;
            if ($imageDB && file_exists(public_path('upload/') . $imageDB)) {
                unlink(public_path('upload/') . $imageDB);
            }
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }

        if ($cv_upload)
        {
            $cv_upload_file = $teacher_list->cv_upload;
            if ($cv_upload_file && file_exists(public_path('upload/') . $cv_upload_file)) {
                unlink(public_path('upload/') . $cv_upload_file);
            }
            $cv_uploadfile = time().'.'.$cv_upload->getClientOriginalExtension();
            $cv_upload->move(public_path('upload/'), $cv_uploadfile);
            $data['cv_upload'] = $cv_uploadfile;
        }

        $teacher_list->update($data);
        return redirect('teacher_list')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(MemberList $teacher_list)
    {
        $imageDB = $teacher_list->image;
        $cv_uploadDB = $teacher_list->cv_upload;
    
        if ($imageDB) {
            $imagePath = public_path('upload/') . $imageDB;
            if (file_exists($imagePath)) {
                try {
                    unlink($imagePath);
                } catch (\Exception $e) {
                    \Log::error('Error deleting image: ' . $e->getMessage());
                }
            }
        }
    
        if ($cv_uploadDB) {
            $cvPath = public_path('upload/') . $cv_uploadDB;
            if (file_exists($cvPath)) {
                try {
                    unlink($cvPath);
                } catch (\Exception $e) {
                    \Log::error('Error deleting CV: ' . $e->getMessage());
                }
            }
        }
    
        $teacher_list->delete();
    
        return redirect('teacher_list')->with('massage', 'Deleted successfully!!!');
    }
    
    
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $role = Role::all();
        return view('admin.users.index',compact('users','role'));
    }
    public function create()
    {
        $role =  Role::all();
        return view('admin.users.create',compact('role'));
    }
    public function destroy($id)
    {
        $userData = User::find($id);
        $imglink1 = $userData->nationalid;
        $imglink2 = $userData->agreement_paper;

        if(!empty($imglink1)){
            $oldLink = public_path('upload/'). $imglink1;
            unlink($oldLink);
        }
        if(!empty($imglink2)){
            $oldLink = public_path('upload/'). $imglink2;
            unlink($oldLink);
        }
        User::destroy($id);
        return redirect('usermanage');
    }

    public function store(Request $request)
    {
        $nationalid = $request->nationalid;
        $agreementpaper = $request->agreementpaper;
        if ($nationalid)
        {
            $nationalidimg = 'nationalid'. time().'.'.$nationalid->getClientOriginalExtension();
            $nationalid->move(public_path('upload/'), $nationalidimg);
            $nationalid = $nationalidimg; 
        }
        else
        {
            $nationalid = ''; 
        }
        if ($agreementpaper)
        {
            $agreementpaperimg = 'agreementpaper' . time().'.'.$agreementpaper->getClientOriginalExtension();
            $agreementpaper->move(public_path('upload/'), $agreementpaperimg);
            $agreementpaper = $agreementpaperimg; 
        }
        else
        {
            $agreementpaper = ''; 
        }

        $username = $request->username; 
        $userrolle = $request->userrolle;
        $email = $request->email; 
        $address = $request->address; 
        $contactno = $request->contactno; 
        $referenceper = $request->referenceper;
        $password = Hash::make($request->password);
        $userrolename = Role::find($userrolle)->role;
        $userData  = 
        [
            'name'=>$username,
            'roleid'=>$userrolle,
            'role_name'=>$userrolename,
            'email'=>$email,
            'address'=>$address,
            'contact_no'=>$contactno,
            'reference_by'=>$referenceper,
            'nationalid'=>$nationalid,
            'agreement_paper'=>$agreementpaper,
            'password'=>$password,
        ];
        User::create($userData);
        return redirect('usermanage');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role =  Role::all();
        return view('admin.users.edit',compact('user','role'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $oldData = User::find($id);

        $old1 = $oldData->nationalid;
        $old2 = $oldData->agreement_paper;

        $username = $request->username; 
        $userrolle = $request->userrolle;
        $email = $request->email; 
        $address = $request->address; 
        $contactno = $request->contactno; 
        $referenceper = $request->referenceper;
        // $userrolename = Role::find($userrolle)->role;

        $nationalid = $request->nationalid;
        $agreementpaper = $request->agreementpaper;
        $userData  = 
        [
            'name'=>$username,
            'roleid'=>1,
            'role_name'=>$username,
            'email'=>$email,
            'address'=>$address,
            'contact_no'=>$contactno,
            'reference_by'=>$referenceper,
        ];
        if(!empty($request->password)){
            $password = Hash::make($request->password);
            $userData['password']  = $password;
        }
        if(!empty($nationalid)){
            
            $nationalidTxt = "nid". time() . '.' .$nationalid->getClientOriginalExtension();
            $nationalid->move(public_path('upload'),$nationalidTxt);
            $userData['nationalid'] = $nationalidTxt;

            if($old1){
                $oldLink = public_path('upload/'). $old1;
                // unlink($oldLink);
            }
        }
        if(!empty($agreementpaper)){

            $agreement_paperTxt = "agmppr". time() . '.' . $agreementpaper->getClientOriginalExtension();
            $agreementpaper->move(public_path('upload'),$agreement_paperTxt);
            $userData['agreement_paper'] = $agreement_paperTxt;
            if($old2){
                $oldLink = public_path('upload/'). $old2;
                // unlink($oldLink);
            }
        }

        User::find($id)->update($userData);
        return redirect('usermanage');
    }
}
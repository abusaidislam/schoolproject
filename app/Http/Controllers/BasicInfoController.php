<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;

class BasicInfoController extends Controller
{
    public function index()
    {   
        $basicInfo = BasicInfo::find(1);
        return view('admin.basicInfo.index',compact('basicInfo'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(BasicInfo $basicInfo)
    {
        
    }
    public function edit(BasicInfo $basicInfo)
    {  
        $basicInfo = BasicInfo::find(1);
        return view('admin.basicInfo.edit',compact('basicInfo'));
    }
    
    public function update(Request $request,$id)
    {
        $title = $request->title;
        $address = $request->address;
        $email = $request->email;
        $mobile = $request->mobile;
        $fbLink = $request->fbLink;
        $instraLink = $request->instraLink;
        $google = $request->google;
        $whatsapp = $request->whatsapp;
        $youtubeLink = $request->youtubeLink;
        $favicon = $request->favicon;
        $message = $request->message;
        $basicInfo = BasicInfo::find($id);
        $data =
        [
            'title'=>$title,
            'address'=>$address,
            'email'=>$email,
            'mobile'=>$mobile,
            'google'=>$google,
            'fbLink'=>$fbLink,
            'instraLink'=>$instraLink,
            'youTubeLink'=>$youtubeLink,
            'whatsapp'=>$whatsapp,
            'message'=>$message,
        ];
        if(!empty($favicon)){

            $faviconImgName = "fav". time() . '.' .$favicon->getClientOriginalExtension();
            $favicon->move(public_path('upload'),$faviconImgName);
            $oldFavIconLink = public_path('upload/'). $basicInfo->favIcon;
            // unlink($oldFavIconLink);
            $data['favIcon'] = $faviconImgName;
        }
        $basicInfo->update($data);
        return redirect('basicinfo');
    }
    
    public function destroy(BasicInfo $basicInfo)
    {
        //
    }
}

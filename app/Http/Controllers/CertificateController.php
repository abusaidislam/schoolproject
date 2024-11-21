<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $data = Certificate::orderBy('id','desc')->get();
        return view('admin.certificate.index',compact('data'));
    }

    public function create()
    {
        // $menus = menu::orderBy('name','asc')->get();
        // return view('admin.contents.create',compact('menus'));
        return view('admin.certificate.create');
    }

    public function store(Request $request)
    {
        $image = $request->img;

        $data = 
        [
            'title'=>$request->title,
        ];

        if ($image)
        {
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        Certificate::create($data);
        return redirect('certificate');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.contents.edit',compact('certificate'));
    }

   
    public function update(Request $request, Certificate $certificate)
    {
        $image = $request->img;
        $data = 
        [
            'title'=>$request->title,
        ];
        if ($image)
        {
            $imageDB = $certificate->image;
            if($imageDB){
                unlink(public_path('upload/').$imageDB);
            }
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        $certificate->update($data);
        return redirect('certificate');
    }
    
    public function destroy(Certificate $certificate)
    {
        $imageDB = $certificate->image;
        if($imageDB){
            unlink(public_path('upload/').$imageDB);
        }
        $certificate->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $data = content::orderBy('id','desc')->get();
        return view('admin.contents.index',compact('data'));
    }
    public function create()
    {
        return view('admin.contents.create');
    }
    public function store(Request $request)
    {
        $image = $request->image;
        $data =
        [
            'title'=>$request->title,
        ];
        if ($image)
        {
            $imgtext = 'homFimg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        content::create($data);
        return redirect('home_feature')->with('massage', 'Inserted successfully!!!');
    }
    public function show(content $content)
    {

    }
    public function edit(content $home_feature)
    {
        return view('admin.contents.edit',compact('home_feature'));
    }
    public function update(Request $request, content $home_feature)
    {
        $image = $request->image;
        $data =
        [
            'title'=>$request->title,
        ];
        if ($image)
        {
            $imageDB = $home_feature->image;
            if($imageDB){
                unlink(public_path('upload/').$imageDB);
            }
            $imgtext = 'homFimg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        $home_feature->update($data);
        return redirect('home_feature')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(content $home_feature)
    {
        $imageDB = $home_feature->image;
        if($imageDB){
            unlink(public_path('upload/').$imageDB);
        }
        $home_feature->delete();
        return redirect()->back();
    }
}

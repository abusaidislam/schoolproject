<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Albume;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::orderBy('id','desc')->get();
        return view('admin.video.index',compact('data'));
    }
    public function create()
    {
        return view('admin.video.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'title'=>$request->title,
            'vcode'=>$request->vcode,
            'vStatus'=>$request->vStatus,
        ];
        Video::create($data);
        return redirect('video')->with('massage', 'Inserted successfully!!!');
    }
    public function show(Video $video)
    {
        //
    }
    public function edit(Video $video)
    {
        return view('admin.video.edit',compact('video'));
    }
    public function update(Request $request, Video $video)
    {
        $data =
        [
            'title'=>$request->title,
            'vcode'=>$request->vcode,
            'vStatus'=>$request->vStatus,
        ];
        $video->update($data);
        return redirect('video')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect('video')->with('massage', 'Delated successfully!!!');
    }
}

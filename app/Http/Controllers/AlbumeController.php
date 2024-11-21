<?php

namespace App\Http\Controllers;

use App\Models\Albume;
use App\Models\Activities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlbumeController extends Controller
{
    public function index()
    {
        $data = Albume::orderBy('id','desc')->get();
        return view('admin.albume.index',compact('data'));
    }
    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.albume.create', compact('activities'));
    }
    public function store(Request $request)
    {
        $data =
        [
            'alName'=>$request->alName,
            'alSlug'=>Str::slug($request->alName),
            'alStatus'=>$request->alStatus,
        ];
        Albume::create($data);
        return redirect('albume')->with('massage', 'Inserted successfully!!!');
    }
    public function edit(Albume $albume)
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.albume.edit',compact('albume','activities'));
    }
    public function update(Request $request, Albume $albume)
    {
        $data =
        [
            'alName'=>$request->alName,
            'alSlug'=>Str::slug($request->alName),
            'alStatus'=>$request->alStatus,
        ];
        $albume->update($data);
        return redirect('albume')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(Albume $albume)
    {
        $albume->delete();
        return redirect('albume')->with('massage', 'Deleted successfully!!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Albume;
use App\Models\Gallary;
use App\Models\Activities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class GallaryController extends Controller
{
    public function index()
    {
        $data = Gallary::orderBy('id','desc')->get();

        return view('admin.gallary.index',compact('data'));
    }

    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        $albume = Albume::orderBy('id','desc')->get();
        return view('admin.gallary.create',compact('albume','activities'));
    }

    public function store(Request $request)
    {
        $albumName = Albume::find($request->albume_type)->alName;
        $image = $request->img;
        $data =
        [
            'title'=>$request->title,
            'albume_type'=>$request->albume_type,
            'albume_slug'=>Str::slug($albumName),
            'photStatus'=>$request->photStatus,
        ];

        if ($image)
        {
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        Gallary::create($data);
        return redirect('gallary')->with('massage', 'Inserted successfully!!!');
    }
    public function edit(Gallary $gallary)
    {
        $activities = Activities::orderBy('id','asc')->get();
        $albume = Albume::orderBy('id','desc')->get();
        return view('admin.gallary.edit',compact('albume','gallary','activities'));
    }
    public function update(Request $request, Gallary $gallary)
{
    try {
        $albumName = Albume::find($request->albume_type)->alName;
        $image = $request->img;
        $data = [
            'title' => $request->title,
            'albume_type' => $request->albume_type,
            'albume_slug' => Str::slug($albumName),
            'photStatus' => $request->photStatus,
        ];

        if ($image) {
            $imageDB = $gallary->image;
            if ($imageDB) {
                $imagePath = public_path('upload/') . $imageDB;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imgtext = 'contImg' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }

        $gallary->update($data);
        return redirect('gallary')->with('massage', 'Updated successfully!!!');
    } catch (\Exception $e) {
        return redirect('gallary')->with('error', 'An error occurred while updating.');
    }
}

public function destroy(Gallary $gallary)
{
    try {
        $imageDB = $gallary->image;
        if ($imageDB) {
            $imagePath = public_path('upload/') . $imageDB;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $gallary->delete();
        return redirect('gallary')->with('massage', 'Deleted successfully!!!');
    } catch (\Exception $e) {
        return redirect('gallary')->with('error', 'An error occurred while deleting.');
    }
}

}

<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::orderBy('id','desc')->get();
        return view('admin.about.index',compact('data'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = 
        [
            'title'=>$request->title,
            'longDetails'=>$request->longDescription,
        ];
        About::create($data);
        return redirect('about')->with('massage', 'Inserted successfully!!!');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit',compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = 
        [
            'title'=>$request->title,
            'longDetails'=>$request->longDescription,
        ];
      
        $about->update($data);
        return redirect('about')->with('massage', 'Updated successfully!!!');
    }
    
    public function destroy(About $about)
    {
        $about->delete();
        return redirect('about')->with('massage', 'Deleted successfully!!!');
    }
}

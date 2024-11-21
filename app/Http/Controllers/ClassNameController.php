<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{

    public function index()
    {
        $data = ClassName::orderBy('id','desc')->get();
        return view('admin.classname.index',compact('data'));
    }
    public function create()
    {
        return view('admin.classname.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'day'=>$request->day,
            'subject_name'=>$request->subject_name,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ];
        ClassName::create($data);
        return redirect('class_time')->with('massage', 'Inserted successfully!!!');
    }
    public function show(ClassName $className)
    {
        //
    }
    public function edit($id)
    {
        $className = ClassName::find($id);
        return view('admin.classname.edit',compact('className'));
    }
    public function update(Request $request, $id)
    {
        $className = ClassName::find($id);

        $data =
        [
            'day'=>$request->day,
            'subject_name'=>$request->subject_name,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ];
        $className->update($data);
        return redirect('class_time')->with('massage', 'Updated successfully!!!');
    }
    public function destroy( $id)
    {
         $className = ClassName::find($id);
        $className->delete();
        return redirect('class_time')->with('massage', 'Deleted successfully!!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CategoryILevel8;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryILevel8Controller extends Controller
{
    public function index()
    {
        $data = CategoryILevel8::orderBy('id','asc')->get();
        return view('admin.category_I_level8.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category_I_level8.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'num_length1'=>$request->num_length1,
            'num_length2'=>$request->num_length2,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'type'=>$request->type,
            'decimal'=>$request->decimal,
            'status'=>$request->status,
        ];
        CategoryILevel8::create($data);
        return redirect('category-i-level8')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CategoryILevel8 = CategoryILevel8::find($id);
        return view('admin.category_I_level8.edit',compact('CategoryILevel8'));
    }
    public function update(Request $request, $id)
    {
        $CategoryILevel8 = CategoryILevel8::find($id);
        $data =
        [
            'num_length1'=>$request->num_length1,
            'num_length2'=>$request->num_length2,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'type'=>$request->type,
            'decimal'=>$request->decimal,
            'status'=>$request->status,
        ];
        $CategoryILevel8->update($data);
        return redirect('category-i-level8')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CategoryILevel8 = CategoryILevel8::find($id);
        $CategoryILevel8->delete();
        return redirect('category-i-level8')->with('massage', 'Deleted successfully!!!');
    }
}

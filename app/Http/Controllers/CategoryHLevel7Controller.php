<?php

namespace App\Http\Controllers;

use App\Models\CategoryHLevel7;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryHLevel7Controller extends Controller
{
    public function index()
    {
        $data = CategoryHLevel7::orderBy('id','asc')->get();
        return view('admin.category_H_level7.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category_H_level7.create');
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
            'status'=>$request->status,
        ];
        CategoryHLevel7::create($data);
        return redirect('category-h-level7')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CategoryHLevel7 = CategoryHLevel7::find($id);
        return view('admin.category_H_level7.edit',compact('CategoryHLevel7'));
    }
    public function update(Request $request, $id)
    {
        $CategoryHLevel7 = CategoryHLevel7::find($id);
        $data =
        [
            'num_length1'=>$request->num_length1,
            'num_length2'=>$request->num_length2,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'type'=>$request->type,
            'status'=>$request->status,
        ];
        $CategoryHLevel7->update($data);
        return redirect('category-h-level7')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CategoryHLevel7 = CategoryHLevel7::find($id);
        $CategoryHLevel7->delete();
        return redirect('category-h-level7')->with('massage', 'Deleted successfully!!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CategoryELevel4;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CategoryELevel4Controller extends Controller
{
    public function index()
    {
        $data = CategoryELevel4::orderBy('id','asc')->get();
        return view('admin.category_E_level4.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category_E_level4.create');
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
        CategoryELevel4::create($data);
        return redirect('category-e-level4')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CategoryELevel4 = CategoryELevel4::find($id);
        return view('admin.category_E_level4.edit',compact('CategoryELevel4'));
    }
    public function update(Request $request, $id)
    {
        $CategoryELevel4 = CategoryELevel4::find($id);
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
        $CategoryELevel4->update($data);
        return redirect('category-e-level4')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CategoryELevel4 = CategoryELevel4::find($id);
        $CategoryELevel4->delete();
        return redirect('category-e-level4')->with('massage', 'Deleted successfully!!!');
    }
}

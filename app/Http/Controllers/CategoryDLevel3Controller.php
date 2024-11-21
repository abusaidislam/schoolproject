<?php

namespace App\Http\Controllers;

use App\Models\CategoryDLevel3;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryDLevel3Controller extends Controller
{
    public function index()
    {
        $data = CategoryDLevel3::orderBy('id','asc')->get();
        return view('admin.category_D_level3.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category_D_level3.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'status'=>$request->status,
        ];
        CategoryDLevel3::create($data);
        return redirect('category-d-level3')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CategoryDLevel3 = CategoryDLevel3::find($id);
        return view('admin.category_D_level3.edit',compact('CategoryDLevel3'));
    }
    public function update(Request $request, $id)
    {
        $CategoryDLevel3 = CategoryDLevel3::find($id);
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'status'=>$request->status,
        ];
        $CategoryDLevel3->update($data);
        return redirect('category-d-level3')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CategoryDLevel3 = CategoryDLevel3::find($id);
        $CategoryDLevel3->delete();
        return redirect('category-d-level3')->with('massage', 'Deleted successfully!!!');
    }
}

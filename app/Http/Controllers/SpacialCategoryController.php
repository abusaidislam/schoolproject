<?php

namespace App\Http\Controllers;

use App\Models\SpacialCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SpacialCategoryController extends Controller
{
    public function index()
    {
        $data = SpacialCategory::orderBy('id','desc')->get();
        return view('admin.special_category.index',compact('data'));
    }
    public function create()
    {
        return view('admin.special_category.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'game_time'=>$request->game_time,
            'status'=>$request->status,
        ];
        SpacialCategory::create($data);
        return redirect('special-category')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $SpacialCategory = SpacialCategory::find($id);
        return view('admin.special_category.edit',compact('SpacialCategory'));
    }
    public function update(Request $request, $id)
    {
        $SpacialCategory = SpacialCategory::find($id);
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'game_time'=>$request->game_time,
            'status'=>$request->status,
        ];
        $SpacialCategory->update($data);
        return redirect('special-category')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $SpacialCategory = SpacialCategory::find($id);
        $SpacialCategory->delete();
        return redirect('special-category')->with('massage', 'Deleted successfully!!!');
    }
}

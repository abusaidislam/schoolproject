<?php

namespace App\Http\Controllers;

use App\Models\SpacialCategoryA2;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SpacialCategoryA2Controller extends Controller
{
    public function index()
    {
        $data = SpacialCategoryA2::orderBy('id','desc')->get();
        return view('admin.special_category_A2.index',compact('data'));
    }
    public function create()
    {
        return view('admin.special_category_A2.create');
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
        SpacialCategoryA2::create($data);
        return redirect('special-category-a2')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $SpacialCategoryA2 = SpacialCategoryA2::find($id);
        return view('admin.special_category_A2.edit',compact('SpacialCategoryA2'));
    }
    public function update(Request $request, $id)
    {
        $SpacialCategoryA2 = SpacialCategoryA2::find($id);
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'game_time'=>$request->game_time,
            'status'=>$request->status,
        ];
        $SpacialCategoryA2->update($data);
        return redirect('special-category-a2')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $SpacialCategoryA2 = SpacialCategoryA2::find($id);
        $SpacialCategoryA2->delete();
        return redirect('special-category-a2')->with('massage', 'Deleted successfully!!!');
    }
}

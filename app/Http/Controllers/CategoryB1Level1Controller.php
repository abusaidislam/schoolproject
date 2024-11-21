<?php

namespace App\Http\Controllers;
use App\Models\CategoryB1Level1;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CategoryB1Level1Controller extends Controller
{
    public function index()
    {
        $data = CategoryB1Level1::orderBy('id','desc')->get();
        return view('admin.category_B1_Level1.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category_B1_Level1.create');
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
        CategoryB1Level1::create($data);
        return redirect('category-b1-level1')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CategoryB1Level1 = CategoryB1Level1::find($id);
        return view('admin.category_B1_Level1.edit',compact('CategoryB1Level1'));
    }
    public function update(Request $request, $id)
    {
        $CategoryB1Level1 = CategoryB1Level1::find($id);
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'game_time'=>$request->game_time,
            'status'=>$request->status,
        ];
        $CategoryB1Level1->update($data);
        return redirect('category-b1-level1')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CategoryB1Level1 = CategoryB1Level1::find($id);
        $CategoryB1Level1->delete();
        return redirect('category-b1-level1')->with('massage', 'Deleted successfully!!!');
    }
}

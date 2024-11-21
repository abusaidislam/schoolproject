<?php

namespace App\Http\Controllers;

use App\Models\CompetitionCategoryLevel2;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompetionCategoryLevel2Controller extends Controller
{
    public function index()
    {
        $data = CompetitionCategoryLevel2::orderBy('id','asc')->get();
        return view('admin.competiton_category_level2.index',compact('data'));
    }
    public function create()
    {
        return view('admin.competiton_category_level2.create');
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
        CompetitionCategoryLevel2::create($data);
        return redirect('competition-category-level2')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::find($id);
        return view('admin.competiton_category_level2.edit',compact('CompetitionCategoryLevel2'));
    }
    public function update(Request $request, $id)
    {
        $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::find($id);
        $data =
        [
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'num_condition'=>$request->num_condition,
            'status'=>$request->status,
        ];
        $CompetitionCategoryLevel2->update($data);
        return redirect('competition-category-level2')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::find($id);
        $CompetitionCategoryLevel2->delete();
        return redirect('competition-category-level2')->with('massage', 'Deleted successfully!!!');
    }
}

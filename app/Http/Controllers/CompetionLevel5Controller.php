<?php

namespace App\Http\Controllers;

use App\Models\CompetitionLevel5;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CompetionLevel5Controller extends Controller
{
    public function index()
    {
        $data = CompetitionLevel5::orderBy('id','asc')->get();
        return view('admin.competiton_category_level5.index',compact('data'));
    }
    public function create()
    {
        return view('admin.competiton_category_level5.create');
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
        CompetitionLevel5::create($data);
        return redirect('competition-category-level5')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CompetitionLevel5 = CompetitionLevel5::find($id);
        return view('admin.competiton_category_level5.edit',compact('CompetitionLevel5'));
    }
    public function update(Request $request, $id)
    {
        $CompetitionLevel5 = CompetitionLevel5::find($id);
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
        $CompetitionLevel5->update($data);
        return redirect('competition-category-level5')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CompetitionLevel5 = CompetitionLevel5::find($id);
        $CompetitionLevel5->delete();
        return redirect('competition-category-level5')->with('massage', 'Deleted successfully!!!');
    }
}

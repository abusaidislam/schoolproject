<?php

namespace App\Http\Controllers;
use App\Models\CompetitionLevel6;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompetionLevel6Controller extends Controller
{
    public function index()
    {
        $data = CompetitionLevel6::orderBy('id','asc')->get();
        return view('admin.competiton_category_level6.index',compact('data'));
    }
    public function create()
    {
        return view('admin.competiton_category_level6.create');
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
        CompetitionLevel6::create($data);
        return redirect('competition-category-level6')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CompetitionLevel6 = CompetitionLevel6::find($id);
        return view('admin.competiton_category_level6.edit',compact('CompetitionLevel6'));
    }
    public function update(Request $request, $id)
    {
        $CompetitionLevel6 = CompetitionLevel6::find($id);
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
        $CompetitionLevel6->update($data);
        return redirect('competition-category-level6')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CompetitionLevel6 = CompetitionLevel6::find($id);
        $CompetitionLevel6->delete();
        return redirect('competition-category-level6')->with('massage', 'Deleted successfully!!!');
    }
}

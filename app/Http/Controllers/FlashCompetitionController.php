<?php

namespace App\Http\Controllers;

use App\Models\FlashCompetition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FlashCompetitionController extends Controller
{
    public function index()
    {
        $data = FlashCompetition::orderBy('category','asc')->orderBy('id','asc')->get();
        return view('admin.flash_competition.index',compact('data'));
    }
    public function create()
    {
        return view('admin.flash_competition.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'category'=>$request->category,
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'status'=>$request->status,
        ];
        FlashCompetition::create($data);
        return redirect('flash-competition-category')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $FlashCompetition = FlashCompetition::find($id);
        return view('admin.flash_competition.edit',compact('FlashCompetition'));
    }
    public function update(Request $request, $id)
    {
        $FlashCompetition = FlashCompetition::find($id);
        $data =
        [
            'category'=>$request->category,
            'num_length'=>$request->num_length,
            'num_display'=>$request->num_display,
            'num_row'=>$request->num_row,
            'status'=>$request->status,
        ];
        $FlashCompetition->update($data);
        return redirect('flash-competition-category')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $FlashCompetition = FlashCompetition::find($id);
        $FlashCompetition->delete();
        return redirect('flash-competition-category')->with('massage', 'Deleted successfully!!!');
    }
}

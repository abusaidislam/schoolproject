<?php

namespace App\Http\Controllers;


use App\Models\GameTime;
use Illuminate\Http\Request;

class GameTimeController extends Controller
{
    public function index()
    {
        $data = GameTime::orderBy('id','desc')->get();

        return view('admin.game_time.index',compact('data'));
    }
    public function create()
    {
        return view('admin.game_time.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'level'=>$request->level,
            'game_time'=>$request->game_time,
        ];

       
        GameTime::create($data);
        return redirect('game-time')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $GameTime = GameTime::find($id);
        return view('admin.game_time.edit',compact('GameTime'));
    }
    public function update(Request $request, $id)
    {
        $GameTime = GameTime::find($id);

        $data =
        [
          'level'=>$request->level,
          'game_time'=>$request->game_time,
        ];

    
        $GameTime->update($data);
        return redirect('game-time')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $GameTime= GameTime::find($id);
        $GameTime->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
   
}

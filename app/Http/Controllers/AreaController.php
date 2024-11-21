<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $data = Area::orderBy('id','desc')->get();
        return view('admin.area.index',compact('data'));
    }
    public function create()
    {
        return view('admin.area.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'area_name'=>$request->area_name,
            'status'=>$request->status,
        ];
      
        Area::create($data);
        return redirect('area')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $Area = Area::find($id);
        return view('admin.area.edit',compact('Area'));
    }
    public function update(Request $request, $id)
    {
        $Area = Area::find($id);

        $data =
        [
            'area_name'=>$request->area_name,
            'status'=>$request->status,
        ];

    
        $Area->update($data);
        return redirect('area')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $Area= Area::find($id);
        $Area->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}
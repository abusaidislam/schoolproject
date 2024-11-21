<?php

namespace App\Http\Controllers;
use App\Models\Area;
use App\Models\SubArea;
use Illuminate\Http\Request;

class SubAreaController extends Controller
{
    public function index()
    {
        $data = SubArea::orderBy('id','desc')->get();
        return view('admin.subarea.index',compact('data'));
    }
    public function create()
    {
        $area = Area::where('status', 0)->orderBy('area_name','asc')->get();
        return view('admin.subarea.create',compact('area'));
    }
    public function store(Request $request)
    {
        $data =
        [
            'area_id'=>$request->area_id,
            'sub_name'=>$request->sub_name,
        ];
      
        SubArea::create($data);
        return redirect('sub-area')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $Area = Area::where('status', 0)->orderBy('area_name','asc')->get();
        $SubArea = SubArea::find($id);
        return view('admin.subarea.edit',compact('SubArea','Area'));
    }
    public function update(Request $request, $id)
    {
        $SubArea = SubArea::find($id);

        $data =
        [
            'area_id'=>$request->area_id,
            'sub_name'=>$request->sub_name,
        ];

    
        $SubArea->update($data);
        return redirect('sub-area')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $SubArea= SubArea::find($id);
        $SubArea->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}
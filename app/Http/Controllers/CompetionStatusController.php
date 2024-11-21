<?php

namespace App\Http\Controllers;


use App\Models\CompetionStatus;
use Illuminate\Http\Request;

class CompetionStatusController extends Controller
{
    public function index()
    {
        $data = CompetionStatus::orderBy('id','asc')->get();
        return view('admin.compition_status.index',compact('data'));
    }
    public function create()
    {
        return view('admin.compition_status.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'status'=>$request->status,
        ];
        CompetionStatus::create($data);
        return redirect('competition-status')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CompetionStatus = CompetionStatus::find($id);
        return view('admin.compition_status.edit',compact('CompetionStatus'));
    }
    public function update(Request $request, $id)
    {
        $CompetionStatus = CompetionStatus::find($id);
        $data =
        [
            'status'=>$request->status,
        ];
        $CompetionStatus->update($data);
        return redirect('competition-status')->with('massage', 'Updated successfully!!!');
    }
   
}

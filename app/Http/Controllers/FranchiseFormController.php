<?php

namespace App\Http\Controllers;

use App\Models\FranchiseForm;
use Illuminate\Http\Request;

class FranchiseFormController extends Controller
{
    public function index()
    {
        $data = FranchiseForm::orderBy('id','desc')->get();
        return view('admin.franchiseform.index',compact('data'));
    }
    public function create()
    {
        return view('admin.franchiseform.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'type'=>$request->type,
            'title'=>$request->title,
        ];
      
        FranchiseForm::create($data);
        return redirect('franchise-form')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $FranchiseForm = FranchiseForm::find($id);
        return view('admin.franchiseform.edit',compact('FranchiseForm'));
    }
    public function update(Request $request, $id)
    {
        $FranchiseForm = FranchiseForm::find($id);

        $data =
        [
            'type'=>$request->type,
            'title'=>$request->title,
        ];

    
        $FranchiseForm->update($data);
        return redirect('franchise-form')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $FranchiseForm= FranchiseForm::find($id);
        $FranchiseForm->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}
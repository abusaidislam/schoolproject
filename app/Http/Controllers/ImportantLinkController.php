<?php

namespace App\Http\Controllers;

use App\Models\ImportantLink;
use App\Models\Activities;
use Illuminate\Http\Request;

class ImportantLinkController extends Controller
{

    public function index()
    {
        $data = ImportantLink::orderBy('id','desc')->get();
        return view('admin.ImportantLink.index',compact('data'));
    }
    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.ImportantLink.create', compact('activities'));
    }
    public function store(Request $request)
    {
        $data =
        [
            'title'=>$request->title,
            'link'=>$request->link,
            'linkstatus'=>$request->linkstatus,
        ];
        ImportantLink::create($data);
        return redirect('important_link')->with('massage', 'Inserted successfully!!!');
    }
    public function show(ImportantLink $importantLink)
    {
        //
    }
    public function edit(ImportantLink $importantLink)
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.ImportantLink.edit',compact('importantLink','activities'));
    }
    public function update(Request $request, ImportantLink $importantLink)
    {
        $data =
        [
            'title'=>$request->title,
            'link'=>$request->link,
            'linkstatus'=>$request->linkstatus,
        ];
        $importantLink->update($data);
        return redirect('important_link')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(ImportantLink $importantLink)
    {
        $importantLink->delete();
        return redirect('important_link')->with('massage', 'Deleted successfully!!!');
    }
}

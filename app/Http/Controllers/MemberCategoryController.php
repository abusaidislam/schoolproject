<?php

namespace App\Http\Controllers;
use App\Models\MemberCategory;
use App\Models\Activities;
use Illuminate\Http\Request;

class MemberCategoryController extends Controller
{
    public function index()
    {
        $data = MemberCategory::orderBy('id','asc')->get();
        return view('admin.membarCategory.index',compact('data'));
    }
    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.membarCategory.create', compact('activities'));
    }
    public function store(Request $request)
    {
        $data =
        [
            'title'=>$request->title,
            'tStatus'=>$request->tStatus,
        ];
        MemberCategory::create($data);
        return redirect('teacher_category')->with('massage', 'Inserted successfully!!!');
    }
    public function show(content $content)
    {
        //
    }
    public function edit(MemberCategory $teacher_category)
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.membarCategory.edit',compact('teacher_category', 'activities'));
    }
    public function update(Request $request, MemberCategory $teacher_category)
    {
        $data =
        [
            'title'=>$request->title,
            'tStatus'=>$request->tStatus,
        ];
        $teacher_category->update($data);
        return redirect('teacher_category')->with('massage', 'Updated successfully!!!');
    }
    public function destroy(MemberCategory $teacher_category)
    {
        $teacher_category->delete();
        return redirect('teacher_category')->with('massage', 'Deleted successfully!!!');
    }
}

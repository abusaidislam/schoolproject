<?php

namespace App\Http\Controllers;

use App\Models\CompitionCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompitionCategoryController extends Controller
{
    public function index()
    {
        $data = CompitionCategory::orderBy('id','desc')->get();
        return view('admin.compition_category.index',compact('data'));
    }
    public function create()
    {
        return view('admin.compition_category.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'title'=>$request->title,
            'slug' => Str::slug($request->title),
            'status'=>$request->status,
        ];
        CompitionCategory::create($data);
        return redirect('compition-category')->with('massage', 'Inserted successfully!!!');
    }
    public function edit($id)
    {
        $CompitionCategory = CompitionCategory::find($id);
        return view('admin.compition_category.edit',compact('CompitionCategory'));
    }
    public function update(Request $request, $id)
    {
        $CompitionCategory = CompitionCategory::find($id);
        $data =
        [
            'title'=>$request->title,
            'slug' => Str::slug($request->title),
            'status'=>$request->status,
        ];
        $CompitionCategory->update($data);
        return redirect('compition-category')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CompitionCategory = CompitionCategory::find($id);
        $CompitionCategory->delete();
        return redirect('compition-category')->with('massage', 'Deleted successfully!!!');
    }
}

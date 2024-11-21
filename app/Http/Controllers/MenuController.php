<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Activities;
use Illuminate\Support\Str;
class MenuController extends Controller
{
    public function index()
    {

        $data = Menu::orderBy('id','asc')->get();
        return view('admin.menu.index',compact('data'));
    }
    public function create()
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.menu.create', compact('activities'));
    }
    public function store(Request $request)
    {
        $data =
        [
            'name'=>$request->name,
            'menu_slug' => Str::slug($request->name),
            'mstatus'=>$request->mstatus,
        ];
     
        Menu::create($data);
        return redirect('menu')->with('massage', 'Inserted successfully!!!');
    }
    public function edit(Menu $Menu)
    {
        $activities = Activities::orderBy('id','asc')->get();
        return view('admin.menu.edit',compact('Menu','activities'));
    }
    public function update(Request $request, Menu $Menu)
    {
        $data =
        [
            'name'=>$request->name,
            'menu_slug' => Str::slug($request->name),
            'mstatus'=>$request->mstatus,
        ];
        
        $Menu->update($data);
        return redirect('menu')->with('massage', 'Updated successfully!!!');
    }

    public function destroy(Menu $Menu)
    {
       
        $Menu->delete();
        return redirect('menu')->with('massage', 'Deleted successfully!!!');
    }
}

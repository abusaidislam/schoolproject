<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Support\Str;
class SubmenuController extends Controller
{
    public function index()
    {
        $data = SubMenu::orderBy('id','desc')->get();
         return view('admin.subMenu.index',compact('data'));
    }
    public function create()
    {
        $data = Menu::orderBy('id','asc')->get();
        return view('admin.subMenu.create',compact('data'));
    }

    public function store(Request $request)
    {
        $data = 
        [
            'menu_id'=>$request->menu_id,
            'submenu'=>$request->submenu,
            'slug' => Str::slug($request->submenu),
            'status' =>$request->status,
        ];

        SubMenu::create($data);
        return redirect('sub-menu')->with('massage', 'Inserted successfully!!!');
    }

    public function edit(SubMenu $SubMenu)
    {
        $data =  Menu::orderBy('id','asc')->get();
        return view('admin.subMenu.edit',compact('data','SubMenu'));
    }

 
    public function update(Request $request, SubMenu $SubMenu)
    {
        $data = 
        [
            'menu_id'=>$request->menu_id,
            'submenu'=>$request->submenu,
            'slug' => Str::slug($request->submenu),
            'status' =>$request->status,
        ];
     
        $SubMenu->update($data);
        return redirect('sub-menu')->with('massage', 'Updated successfully!!!');
    }
    
    public function destroy(SubMenu $SubMenu)
    {
      
        $SubMenu->delete();
        return redirect('sub-menu')->with('massage', 'Deleted successfully!!!');
    }
}

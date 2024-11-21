<?php

namespace App\Http\Controllers;

use App\Models\content;
use App\Models\HomepageManage;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomepageManageController extends Controller
{
    public function index()
    {
        $data = HomepageManage::orderBy('id','desc')->get();
        return view('admin.homepage.index',compact('data'));
    }
    public function create()
    {
        $content = content::orderBy('id','desc')->get();
        $topManu = Menu::orderBy('id','asc')->get();
        $submenu = SubMenu::orderBy('id','asc')->get();
        return view('admin.homepage.create',compact('submenu','content', 'topManu'));
    }
    public function menuType($menuId)
    {
        return $menutype = SubMenu::where('menu_id',$menuId)->orderBy('submenu','asc')->get();
    }
    public function store(Request $request)
    {
        $contentType = $request->content_type;
        if ($contentType) {
            $image = $request->img;
            $doumentfile = $request->doumentfile;
            $data =
            [
                'content_type'=>$request->content_type,
                'title'=>$request->title,
                'shortDetails'=>$request->shortDetails,
                'longDetails'=>$request->longDescription,
            ];
            if ($image)
            {
                $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/'), $imgtext);
                $data['image'] = $imgtext;
            }
            if ($doumentfile)
            {
                $doumenttext = 'docuimg'. time().'.'.$doumentfile->getClientOriginalExtension();
                $doumentfile->move(public_path('upload/'), $doumenttext);
                $data['doumentfile'] = $doumenttext;
            }
            HomepageManage::create($data);
        }else{
            $image = $request->img;
            $doumentfile = $request->doumentfile;
            $subMenuName = SubMenu::find($request->subMenuId)->submenu;
            $data =
            [
                'menuId'=>$request->menuId,
                'subMenuId'=>$request->subMenuId,
                'subMenuName'=>$subMenuName,
                'submenu_slug'=>Str::slug($subMenuName),
                'title'=>$request->title,
                'shortDetails'=>$request->shortDetails,
                'longDetails'=>$request->longDescription,
            ];
            if ($image)
            {
                $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/'), $imgtext);
                $data['image'] = $imgtext;
            }
            if ($doumentfile)
            {
                $doumenttext = 'docuimg'. time().'.'.$doumentfile->getClientOriginalExtension();
                $doumentfile->move(public_path('upload/'), $doumenttext);
                $data['doumentfile'] = $doumenttext;
            }
            HomepageManage::create($data);
        }
        return redirect('homepagemanage')->with('massage', 'Inserted successfully!!!');
    }

    // public function show(content $content)
    // {

    // }

    public function edit(HomepageManage $homepagemanage)
    {
        $topManu = Menu::orderBy('id','asc')->get();
        $content = content::orderBy('id','desc')->get();
        $submenu = SubMenu::orderBy('id','asc')->get();
        return view('admin.homepage.edit',compact('submenu','homepagemanage','topManu','content'));
    }
    public function update(Request $request, HomepageManage $homepagemanage)
    {
        $contentType = $request->content_type;
        
        try {
            if ($contentType) {
                $image = $request->img;
                $doumentfile = $request->doumentfile;
                $data = [
                    'content_type' => $request->content_type,
                    'title' => $request->title,
                    'shortDetails' => $request->shortDetails,
                    'longDetails' => $request->longDescription,
                ];
    
                if ($image) {
                    $imageDB = $homepagemanage->image;
                    if ($imageDB) {
                        $imagePath = public_path('upload/') . $imageDB;
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }
                    $imgtext = 'contImg' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('upload/'), $imgtext);
                    $data['image'] = $imgtext;
                }
    
                if ($doumentfile) {
                    $doumentfileDB = $homepagemanage->doumentfile;
                    if ($doumentfileDB) {
                        $doumentfilePath = public_path('upload/') . $doumentfileDB;
                        if (file_exists($doumentfilePath)) {
                            unlink($doumentfilePath);
                        }
                    }
                    $doumenttext = 'docuimg' . time() . '.' . $doumentfile->getClientOriginalExtension();
                    $doumentfile->move(public_path('upload/'), $doumenttext);
                    $data['doumentfile'] = $doumenttext;
                }
    
                $homepagemanage->update($data);
            } else {
        $image = $request->img;
        $doumentfile = $request->doumentfile;
        $subMenuName = SubMenu::find($request->subMenuId)->submenu;

        $data =
        [
            // 'content_type'=>$request->content_type,
            'menuId'=>$request->menuId,
            'subMenuId'=>$request->subMenuId,
            'subMenuName'=>$subMenuName,
            'submenu_slug'=>Str::slug($subMenuName),
            'title'=>$request->title,
            'shortDetails'=>$request->shortDetails,
            'longDetails'=>$request->longDescription,
        ];
        if ($image)
        {
            $imageDB = $homepagemanage->image;
            if($imageDB){
                unlink(public_path('upload/').$imageDB);
            }
            $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/'), $imgtext);
            $data['image'] = $imgtext;
        }
        if ($doumentfile)
        {
            $doumentfileDB = $homepagemanage->doumentfile;
            if($doumentfileDB){
                unlink(public_path('upload/').$doumentfileDB);
            }
            $doumenttext = 'docuimg'. time().'.'.$doumentfile->getClientOriginalExtension();
            $doumentfile->move(public_path('upload/'), $doumenttext);
            $data['doumentfile'] = $doumenttext;
        }
        $homepagemanage->update($data);
     
              
            }
    
            return redirect('homepagemanage')->with('massage', 'Updated successfully!!!');
        } catch (\Exception $e) {
           
            return redirect('homepagemanage')->with('error', 'An error occurred while updating.');
        }
    }
    // public function update(Request $request, HomepageManage $homepagemanage)
    // {
    //     $contentType = $request->content_type;
    //     if ($contentType) {
    //         $image = $request->img;
    //         $doumentfile = $request->doumentfile;

    //         $data =
    //         [
    //             'content_type'=>$request->content_type,
    //             'title'=>$request->title,
    //             'shortDetails'=>$request->shortDetails,
    //             'longDetails'=>$request->longDescription,
    //         ];
    //         if ($image)
    //         {
    //             $imageDB = $homepagemanage->image;
    //             if($imageDB){
    //                 unlink(public_path('upload/').$imageDB);
    //             }
    //             $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
    //             $image->move(public_path('upload/'), $imgtext);
    //             $data['image'] = $imgtext;
    //         }
    //         if ($doumentfile)
    //         {
    //             $doumentfileDB = $homepagemanage->doumentfile;
    //             if($doumentfileDB){
    //                 unlink(public_path('upload/').$doumentfileDB);
    //             }
    //             $doumenttext = 'docuimg'. time().'.'.$doumentfile->getClientOriginalExtension();
    //             $doumentfile->move(public_path('upload/'), $doumenttext);
    //             $data['doumentfile'] = $doumenttext;
    //         }
    //         $homepagemanage->update($data);
    //     }else{
    //     $image = $request->img;
    //     $doumentfile = $request->doumentfile;
    //     $subMenuName = SubMenu::find($request->subMenuId)->submenu;

    //     $data =
    //     [
    //         // 'content_type'=>$request->content_type,
    //         'menuId'=>$request->menuId,
    //         'subMenuId'=>$request->subMenuId,
    //         'subMenuName'=>$subMenuName,
    //         'submenu_slug'=>Str::slug($subMenuName),
    //         'title'=>$request->title,
    //         'shortDetails'=>$request->shortDetails,
    //         'longDetails'=>$request->longDescription,
    //     ];
    //     if ($image)
    //     {
    //         $imageDB = $homepagemanage->image;
    //         if($imageDB){
    //             unlink(public_path('upload/').$imageDB);
    //         }
    //         $imgtext = 'contImg'. time().'.'.$image->getClientOriginalExtension();
    //         $image->move(public_path('upload/'), $imgtext);
    //         $data['image'] = $imgtext;
    //     }
    //     if ($doumentfile)
    //     {
    //         $doumentfileDB = $homepagemanage->doumentfile;
    //         if($doumentfileDB){
    //             unlink(public_path('upload/').$doumentfileDB);
    //         }
    //         $doumenttext = 'docuimg'. time().'.'.$doumentfile->getClientOriginalExtension();
    //         $doumentfile->move(public_path('upload/'), $doumenttext);
    //         $data['doumentfile'] = $doumenttext;
    //     }
    //     $homepagemanage->update($data);
    //     }
    //     return redirect('homepagemanage')->with('massage', 'Updated successfully!!!');
    // }

    public function destroy(HomepageManage $homepagemanage)
    {
        try {
            $imageDB = $homepagemanage->image;
            if ($imageDB) {
                $imagePath = public_path('upload/') . $imageDB;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            $doumentfileDB = $homepagemanage->doumentfile;
            if ($doumentfileDB) {
                $doumentfilePath = public_path('upload/') . $doumentfileDB;
                if (file_exists($doumentfilePath)) {
                    unlink($doumentfilePath);
                }
            }
    
            $homepagemanage->delete();
            return redirect('homepagemanage')->with('massage', 'Deleted successfully!!!');
        } catch (\Exception $e) {
            return redirect('homepagemanage')->with('error', 'An error occurred while deleting.');
        }
    }
    
}

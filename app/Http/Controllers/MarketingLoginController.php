<?php

namespace App\Http\Controllers;
use App\Models\MarketingLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MarketingLoginController extends Controller
{

    public function index()
    {
        $data = MarketingLogin::orderBy('id','desc')->get();
        return view('admin.marketinglogin.index',compact('data'));
    }
    public function create()
    {
        return view('admin.marketinglogin.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'user_name' => $request->uname,
            'password' => Hash::make($request->password),
            'text_password' => $request->password,
        ];
      
        MarketingLogin::create($data);
        return redirect('marketing-login')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $MarketingLogin = MarketingLogin::find($id);
        return view('admin.marketinglogin.edit',compact('MarketingLogin'));
    }
    public function update(Request $request, $id)
    {
        $MarketingLogin = MarketingLogin::find($id);

        $data =
        [
            'user_name' => $request->uname,
            'password' => Hash::make($request->password),
            'text_password' => $request->password,
        ];

    
        $MarketingLogin->update($data);
        return redirect('marketing-login')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $MarketingLogin= MarketingLogin::find($id);
        $MarketingLogin->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }

   
}
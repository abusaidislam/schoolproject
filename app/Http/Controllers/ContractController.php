<?php

namespace App\Http\Controllers;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{

    public function index()
    {
        $data = contact::orderBy('id','desc')->get();
        return view('admin.message.index',compact('data'));
    }
    
    public function destroy($id)
    {
        $contact= contact::find($id);
        $contact->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }

}

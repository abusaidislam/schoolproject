<?php

namespace App\Http\Controllers;

use App\Models\FranchiseStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FranchiseStoreController extends Controller
{
    public function index()
    {
        $data = FranchiseStore::orderBy('id','desc')->get();
        return view('admin.franchisestore.index',compact('data'));
    }
    
    public function destroy($id)
    {
        $FranchiseStore= FranchiseStore::find($id);
        $FranchiseStore->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }


    public function FranchiseDataStor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'mobile_no' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email|max:255',
            'center' => 'required|array',
            'outside_dist' => 'nullable|string|max:255',
            'interested' => 'required|string|max:255',
            'about_us' => 'required|string|max:255',
        ]);
        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'center' => json_encode($request->center),
            'outside_dist' => $request->outside_dist,
            'interested' => $request->interested,
            'about_us' => $request->about_us,
        ];

        FranchiseStore::create($data);

        return redirect()->back()->with('message', 'Data Submitted Successfully.');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallary;
use App\Models\Video;
use App\Models\MemberList;
use App\Models\StudentInformation;
use App\Models\contact;
use App\Models\FranchiseStore;
use App\Models\Marketing;

class DashboardController extends Controller
{
    public function index()
    {
        $Gallary = Gallary::orderBy('id','desc')->count();
        $Video = Video::orderBy('id','desc')->count();
        $MemberList = MemberList::orderBy('id','desc')->count();
        $StudentInformation = StudentInformation::where('status', '1')->count();
        $contact = contact::orderBy('id','desc')->count();
        $FranchiseStore = FranchiseStore::orderBy('id','desc')->count();
        $Marketing = Marketing::orderBy('id','desc')->count();
        return view('admin.index',compact('Gallary','Video','MemberList','StudentInformation','contact','FranchiseStore','Marketing'));
    }
}


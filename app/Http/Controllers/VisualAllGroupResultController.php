<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SpecialExamData;
use App\Models\CompetionRegiManage;
 use Carbon\Carbon;

class VisualAllGroupResultController extends Controller
{
    public function speciala1()
    {
     
    $data = SpecialExamData::where('cat_id', 1)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_special__a1_result.index', compact('data'));
    }
    public function speciala2()
    {
     
    $data = SpecialExamData::where('cat_id', 2)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_special__a2_result.index', compact('data'));
    }
    public function level1B1()
    {
     
    $data = SpecialExamData::where('cat_id', 3)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level1__b1_result.index', compact('data'));
    }
    public function level1B2()
    {
     
    $data = SpecialExamData::where('cat_id', 4)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level1__b2_result.index', compact('data'));
    }
    public function level2()
    {
     
    $data = SpecialExamData::where('cat_id', 5)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level2__c_result.index', compact('data'));
    }
    public function level3()
    {
     
    $data = SpecialExamData::where('cat_id', 6)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level3__d_result.index', compact('data'));
    }
    public function level4()
    {
     
    $data = SpecialExamData::where('cat_id', 7)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level4__e_result.index', compact('data'));
    }
    public function level5()
    {
     
    $data = SpecialExamData::where('cat_id', 8)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level5__f_result.index', compact('data'));
    }
    public function level6()
    {
     
    $data = SpecialExamData::where('cat_id', 9)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level6__g_result.index', compact('data'));
    }
    public function level7()
    {
     
    $data = SpecialExamData::where('cat_id', 10)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level7__h_result.index', compact('data'));
    }
    public function level8()
    {
     
    $data = SpecialExamData::where('cat_id', 11)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();
        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        $item->userInfo = $userInfo;
    }

    return view('admin.visual_level8__i_result.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SpecialExamData= SpecialExamData::find($id);
        $SpecialExamData->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}

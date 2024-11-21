<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SpecialExamData;
use App\Models\CompetionRegiManage;
 use Carbon\Carbon;
class VisualGroupAController extends Controller
{
    public function index()
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

    return view('admin.visual_group__a_result.index', compact('data'));
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

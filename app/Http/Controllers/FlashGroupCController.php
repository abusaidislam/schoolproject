<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FlashExamData;
use App\Models\CompetionRegiManage;
 use Carbon\Carbon;

class FlashGroupCController extends Controller
{
    public function index()
    {
     
    $data = FlashExamData::where('cat_id', 3)->orderBy('right_ans', 'desc')->get();

    foreach ($data as $item) {
        // Get the user info for each item
        $userInfo = CompetionRegiManage::where('id', $item->user_id)->first();

        if ($userInfo && $userInfo->dateofbirth) {
            $dob = Carbon::parse($userInfo->dateofbirth);
            $userInfo->ageInYears = $dob->diffInYears(Carbon::now());
            $userInfo->ageInMonths = $dob->diffInMonths(Carbon::now()) % 12;
            $userInfo->ageInDays = $dob->diffInDays(Carbon::now()->subYears($userInfo->ageInYears)->subMonths($userInfo->ageInMonths));
        } else {
            $userInfo->ageInYears = $userInfo->ageInMonths = $userInfo->ageInDays = null;
        }

        // Attach userInfo with age data to the item
        $item->userInfo = $userInfo;
    }

    return view('admin.flash_group_c_result.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $FlashExamData= FlashExamData::find($id);
        $FlashExamData->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}

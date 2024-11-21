<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashExamData;
use App\Models\CompetionRegiManage;
 use Carbon\Carbon;

class FlashExamDataController extends Controller
{
    public function index()
    {
     
    $data = FlashExamData::orderBy('cat_id', 'asc')->orderBy('right_ans', 'desc')->get();

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

    return view('admin.flash_competion_result.index', compact('data'));
    }



    public function FlashResultStatus(Request $request)
    {
        $item = FlashExamData::find($request->id);

        if ($item) {
            $item->status = $request->status; // Assuming the column name in your table is `result_status`
            $item->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 404);
        }
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


    public function FlashExamDataA2(Request $request)
    {
        $rightans = $request->input('sumRight');
        $wrongans = $request->input('sumWrongs');
        $remainingTime = $request->input('remainingTime');
        // Check if a record with the same user_id and cat_id already exists
        $examData = FlashExamData::where('user_id', $request->userId)
                                    ->where('cat_id', $request->catId)
                                    ->first();
    
        if ($examData) {
            // Update existing record
            // $examData->right_ans = $rightans;
            // $examData->rong_ans = $wrongans;
        } else {
            // Create a new record if it doesn't exist
            $examData = new FlashExamData();
            $examData->game_time = $remainingTime;
            $examData->user_id = $request->userId;
            $examData->cat_id = $request->catId;
            $examData->right_ans = $rightans;
            $examData->rong_ans = $wrongans;
        }
    
        $examData->save();
    
        return response()->json(['success' => true, 'message' => 'Congratulations! Your competition has been successfully completed!']);
    }
    

    public function destroy($id)
    {
        $FlashExamData= FlashExamData::find($id);
        $FlashExamData->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}

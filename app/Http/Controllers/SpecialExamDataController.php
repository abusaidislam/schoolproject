<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialExamData;
use App\Models\CompetionRegiManage;
 use Carbon\Carbon;
class SpecialExamDataController extends Controller
{
  
    public function index()
    {
     
    $data = SpecialExamData::orderBy('cat_id', 'asc')->orderBy('right_ans', 'desc')->get();

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

    return view('admin.special_category_result.index', compact('data'));
    }



    public function updateResultStatus(Request $request)
    {
        $item = SpecialExamData::find($request->id);

        if ($item) {
            $item->status = $request->status; 
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


    public function updateExamData(Request $request)
    {
   
        $allarrydata = $request->input('allarrydata');
        $rightans = $request->input('rightans');
        $wrongans = $request->input('wrongans');
        $examData = new SpecialExamData();
        $examData->user_id = 1; 
        $examData->cat_id = 1; 
        $examData->question = $allarrydata;
        $examData->right_ans = $rightans;
        $examData->rong_ans = $wrongans;
        $examData->save();
    
        return response()->json(['success' => true, 'message' => 'Data stored successfully']);
    }
    public function updateExamDataA2(Request $request)
    {
        $rightans = $request->input('sumRight');
        $wrongans = $request->input('sumWrongs');
        $remainingTime = $request->input('remainingTime');
        // Check if a record with the same user_id and cat_id already exists
        $examData = SpecialExamData::where('user_id', $request->userId)
                                    ->where('cat_id', $request->catId)
                                    ->first();
    
        if ($examData) {
            // Update existing record
            // $examData->right_ans = $rightans;
            // $examData->rong_ans = $wrongans;
        } else {
            // Create a new record if it doesn't exist
            $examData = new SpecialExamData();
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
        $SpecialExamData= SpecialExamData::find($id);
        $SpecialExamData->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
}

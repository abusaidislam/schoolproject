<?php

namespace App\Http\Controllers;

use App\Models\Albume;
use App\Models\FullCalenderEvent;
use App\Models\Activities;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FullCalenderEventController extends Controller
{
    public function index()
    {
        $data = FullCalenderEvent::orderBy('id','desc')->get();

        return view('admin.fullcalender.index',compact('data'));
    }
    public function create()
    {
        return view('admin.fullcalender.create');
    }
    public function store(Request $request)
    {
        $data =
        [
            'event_type'=>$request->event_type,
            'event_date'=>$request->date,
            'title_text'=>$request->title_text,
        ];

       
        FullCalenderEvent::create($data);
        return redirect('calender-event')->with('massage', 'Inserted successfully!!!');
    }

    public function edit($id)
    {
        $CalenderEvent = FullCalenderEvent::find($id);
        return view('admin.fullcalender.edit',compact('CalenderEvent'));
    }
    public function update(Request $request, $id)
    {
        $CalenderEvent = FullCalenderEvent::find($id);

        $data =
        [
            'event_type'=>$request->event_type,
            'event_date'=>$request->date,
            'title_text'=>$request->title_text,
        ];

    
        $CalenderEvent->update($data);
        return redirect('calender-event')->with('massage', 'Updated successfully!!!');
    }
    public function destroy($id)
    {
        $CalenderEvent= FullCalenderEvent::find($id);
        $CalenderEvent->delete();
        return redirect()->back()->with('massage', 'Deleted successfully!!!');
    }
   
}

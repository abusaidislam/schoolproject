<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Message::orderBy('readStatus','asc')->get();
        // return view('admin.messages.index',compact('data'));
    }

    public function markAs($id,$status)
    {
        if($status==0){
            Message::find($id)->update([
                'readStatus'=>1,
            ]);
        }else{
            Message::find($id)->update([
                'readStatus'=>0
            ]);
        }
        return redirect()->back();
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $data = $request->all();
        $result = Message::create($data);
        if($result)
        {
            $msg = 'Message sent Successfully!';
        }else{
            $msg = 'Message Send faild';
        }
        return response()->json(['success'=>$msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }
}

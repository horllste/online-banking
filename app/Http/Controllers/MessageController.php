<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Message;
use App\Models\User;



class MessageController extends Controller
{
    //

    function index(Request $request){

        
        $messages = Message::with('sender','receiver')->where('sender_id',Auth::id())
        ->orWhere('receiver_id',Auth::id())->paginate(20);
        return view('pages.message',compact('messages'));

    }

    function show(Request $request, $id){
        
        $message = Message::with('sender','receiver')->where('sender_id',Auth::id())
        ->orWhere('receiver_id',Auth::id())
        ->where('id',$id)->first();

        $message->status = "read";
        $message->save();

        return view('pages.view_message',compact('message'));

    }

    function send(){

        $users = User::role('customer-care')->get();
        return view('pages.new_message',compact('users'));

    }



}

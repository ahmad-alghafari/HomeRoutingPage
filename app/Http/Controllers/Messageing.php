<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteConversation;
use App\Jobs\SendingMessage;
use App\Models\ChMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Messageing extends Controller
{
    public function send($receiver  , Request $request ){
        $request->validate([
            'message' => 'required | max:200',
        ]);
        SendingMessage::dispatch($request->message ,$receiver ,Auth::user() );
        return response()->json(['message' => 'Message sent']);
    }

    public function show($user){
        $user = User::where('name',$user)->first();
        if(($user != null ) && ($user->id != Auth::user()->id)){
            $messages = ChMessage::where('from_id' , Auth::user()->id)
                ->where('to_id',$user->id)
                ->orWhere('from_id',$user->id)
                ->where('to_id' ,Auth::user()->id)
                ->orderBy('created_at','asc')
                ->get();
            return view('messaging.message-interface' , compact(['user','messages']));
        }
        return view('errors.404');
    }

    public function search(){
        return view('messaging.message-search' );
    }

    public function delete($receiver , Request $request){
        $user = User::find($receiver);
        if($user){
            DeleteConversation::dispatch($user->id , Auth::user()->id );
            return response()->json(['message' => 'Message deleted']);
        }
        return response()->json(['message' => 'User not found']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\block;
use App\Models\follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Loging;

class BlockController extends Controller
{

    public function store(Request $request , $id){
        $userid2 = User::find($id);
        if(!$userid2){
            return back();
        }
        if(auth::user()->id == $userid2->id){
            //spam code!!
            return back()->with(['error_block'=>'you can not block your self!']);
        }

        if (Auth::user()->block->contains('user_blocked',$userid2->id)) {
            //spam code!!
            return back()->with(['error_block'=>'you can not block him twice!']);
        }

        if(Auth::user()->follow->contains('user_follower',$userid2->id)){
            Auth::user()->follow()->where('user_follower',$userid2->id)->delete();
        }

        if($userid2->follow->contains('user_follower' , auth::user()->id)){
            $userid2->follow()->where('user_follower',auth::user()->id)->delete();
        }

        block::create([
            'user_blocker' => auth::user()->id,
            'user_blocked' => $userid2->id ,
        ]);
        Loging::dispatch(
            Auth::user()->id ,
            'Create',
            Auth::user()->name . ' Blocked ' . $userid2->name,
            'Blocks',
            'home/users/show/' .$userid2->id,
            '',
        );
        return redirect()->route('home.posts.index');
    }

    public function destroy(User $user){
        $user->blockMe()->where('user_blocker' , Auth::user()->id)->delete();
        return redirect()->route('home.users.show' , $user);
    }
}

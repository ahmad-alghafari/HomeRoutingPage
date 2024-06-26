<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class blockUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        $id = $request->route('user');
        $user = User::find($id);

        if(Auth::user()->block()->where('user_blocked' , $user->id)->exists()){
            return response()->view('users.profile-blocked' , compact('user' ));//->with(['warning' => 'you was block this user']);
        }elseif(Auth::user()->blockMe()->where('user_blocker' , $user->id)->exists()){
            return back();
        }else{
            return $next($request);
        }
    }
}

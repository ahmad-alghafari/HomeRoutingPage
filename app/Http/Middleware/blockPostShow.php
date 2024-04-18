<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class blockPostShow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('postshow');
        $post = Post::find($id);
        if(Auth::user()->blockMe()->where('user_blocker' , $post->user->id)->exists()){
            return back();
        }else{
            return $next($request);
        }
    }
}

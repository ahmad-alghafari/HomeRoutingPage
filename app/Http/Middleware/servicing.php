<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

class servicing
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next): Response
    {

        $servicing = Setting::where('route_name' , Route::currentRouteName())->get('servicing')->last()->servicing;
        // dd($servicing);
        if($servicing == 1){
            return redirect()->route('errors.servicing');
        }
        return $next($request);
    }
}

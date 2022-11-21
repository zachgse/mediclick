<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PatientValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $var = $request->appointment;

        if ($var->user_id == null)
        {
            abort(401);
        }
        if ($var->user_id != $user->id)
        {
            abort(401);
        }

      
        //dd($var);
        return $next($request);
    }
}

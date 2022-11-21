<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employee;
class PhysicianValidate
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
        $employee = Employee::where('user_id', $user->id)->get()->first();

     
      
        if ($var->physician_id == null)
        {
            abort(401);
        }
        if ($var->physician_id != $employee->id)
        {
            abort(401);
        }

      
        //dd($var);
        return $next($request);
    }
}

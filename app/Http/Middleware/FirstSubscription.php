<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
class FirstSubscription
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

        $clinic = Post::where('admin_id' , $user->id)->get('status')->first();

        
        if($clinic->status == '1'){
            return redirect()->back()->with('message' , 'You have already paid your first subscription. Please click the "Resubscribe" button to avail another subscription package and to eb.resubscribe. ');
        }

        return $next($request);
    }
}

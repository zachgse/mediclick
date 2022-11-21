<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
class ResubscribeAccess
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

        
        if($clinic->status == '0'){
            return redirect()->back()->with('message' , 'You need to pay your first subscription first to resubscribe. Send your proof of payment below.');
        }

        return $next($request);
    }
}

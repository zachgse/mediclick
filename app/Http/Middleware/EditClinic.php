<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
class EditClinic
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

        $clinic = Post::where('admin_id' , $user->id)->get('editStatus')->first();

        
        if($clinic->editStatus == '0'){
            return redirect()->back()->with('message' , 'Please email at mediclick.philippines@gmail.com to request to edit your clinic information');
        }

        return $next($request);
    }
}

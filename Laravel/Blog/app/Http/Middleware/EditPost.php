<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;

use Closure;
use Auth;

class EditPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $requested_post = $request->posts;

        $check = Auth::user()->posts()->whereId($requested_post)->first();

        if(!$check){
            
            Session::flash('post_message', 'You cannot modify other user\'s post');

            return redirect(route('admin.posts.index'));
        }

        return $next($request);
    }
}

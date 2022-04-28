<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;
class IsOperantionaHead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		if (Auth::user() &&  (Auth::user()->role == 5) ) {
        return $next($request);
		}
		 return redirect('/')->with('error','You have not permission to access dashboard');
    }
}

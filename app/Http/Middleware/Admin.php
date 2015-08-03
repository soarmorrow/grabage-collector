<?php namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if(Auth::user()->roles()->first()->role_id != 1){
            abort(500, 'You don\'t have access to this page');
        }
		return $next($request);
	}

}

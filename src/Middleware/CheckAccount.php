<?php

namespace ConfrariaWeb\Account\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckAccount
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (
            existsAccount() &&
            in_array('auth', $request->route()->middleware()) &&
            !account()
        ){
            Auth::logout();
            return redirect('login');
        }
        return $next($request);
    }
}

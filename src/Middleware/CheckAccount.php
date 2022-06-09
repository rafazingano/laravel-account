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
        $routeMiddleware = $request->route()->middleware();
        //$getRouteName = $request->route()->getName();
        $account = account();

        /*** Verifica se o usuario é vinculado a alguma conta */
        if (
            in_array("ConfrariaWeb\Account\Providers\AccountServiceProvider", get_declared_classes()) &&
            in_array('auth', $routeMiddleware) &&
            !$account
        ){
            Auth::logout();
            return redirect('login');
        }

        /*** Verifica se a conta esta ativa */
        if (
            in_array("ConfrariaWeb\Account\Providers\AccountServiceProvider", get_declared_classes()) &&
            in_array('auth', $routeMiddleware)
        ){
            abort_unless($account->status, 401, 'Conta bloqueada');
        }

        return $next($request);
    }
}

<?php

namespace ConfrariaWeb\Account\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccount
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (existsAccount()) {
            if (in_array('auth', $request->route()->middleware())) {
                $account = NULL;
                $account = (Auth::check()) ? Auth::user()->accounts->first() : NULL;
                abort_unless($account, 404);
                $request->session()->put('account', $account);
            }
            /*
            else {
                $host = parse_url(url()->current())['host'];
                $site = resolve('SiteService')->findByDomain($host);
                $account = ($site) ? $site->accounts->first() : NULL;
            }
            dd(Auth::user()->accounts()->first());
            */
        }

        return $next($request);
    }
}

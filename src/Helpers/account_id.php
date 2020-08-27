<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

if (!function_exists('accountID')) {
    function accountID(){
        if (!Cache::has('accountID')) {
            Auth::logout();
            return redirect()->intended('login');
        }
        return $accountID = Cache::get('accountID');
     }
}
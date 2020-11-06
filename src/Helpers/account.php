<?php
if (!function_exists('account')) {
    function account()
    {
        $account = \Illuminate\Support\Facades\Session::get('account');
        if (!$account) {
            $account_id = Config::get('cw_account.default.account');
            $account = isset($account_id) ? resolve('AccountService')->find($account_id) : NULL;
        }
        return $account;
    }
}
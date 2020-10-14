<?php
if (!function_exists('account')) {
    function account()
    {
        return session('account');
    }
}
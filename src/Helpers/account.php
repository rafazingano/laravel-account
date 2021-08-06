<?php
/**
 * Deve retornar o accont sem fazer nenhuma consulta
 * Tera de ser implementado ainda a busca pela url para quando nao existir na session
 */
if (!function_exists('account')) {
    function account()
    {
        $account = \Illuminate\Support\Facades\Cache::get('account');
        return $account?? false;
    }
}
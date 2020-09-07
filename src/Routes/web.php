<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Account\Controllers')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('accounts', 'AccountController');

        Route::resource('plans', 'PlanController');

    });
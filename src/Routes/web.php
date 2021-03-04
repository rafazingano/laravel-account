<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Account\Controllers')
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::prefix('accounts')
            ->name('accounts.')
            ->group(function () {
                Route::get('datatable', 'AccountController@datatables')->name('datatables');
            });

        Route::resource('accounts', 'AccountController');

        Route::resource('plans', 'PlanController');
    });
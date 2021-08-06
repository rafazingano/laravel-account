<?php

namespace ConfrariaWeb\Account\Providers;

use ConfrariaWeb\Account\Listeners\CreateAccountCache;
use ConfrariaWeb\Account\Listeners\DestroyAccountCache;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;

class AccountEventServiceProvider extends ServiceProvider {

    protected $listen = [
        Attempting::class => [
            DestroyAccountCache::class
        ],
        Login::class => [
            CreateAccountCache::class
        ],
        Logout::class => [
            DestroyAccountCache::class
        ],
    ];

    public function boot() {
        parent::boot();

        //
    }

}

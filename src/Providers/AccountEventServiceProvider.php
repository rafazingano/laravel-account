<?php

namespace ConfrariaWeb\Account\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use ConfrariaWeb\Account\Listeners\CreateAccountNewUserListener;

class AccountEventServiceProvider extends ServiceProvider {

    protected $listen = [
        Registered::class => [
            CreateAccountNewUserListener::class,
        ],
    ];

    public function boot() {
        parent::boot();

        //
    }

}

<?php

namespace ConfrariaWeb\Account\Providers;

use ConfrariaWeb\Account\Listeners\addAccountToRegisteredUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class AccountEventServiceProvider extends ServiceProvider {

    protected $listen = [
        Registered::class => [
            addAccountToRegisteredUser::class,
        ],
    ];

    public function boot() {
        parent::boot();

        //
    }

}

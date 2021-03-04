<?php

namespace ConfrariaWeb\Account\Providers;

use ConfrariaWeb\User\Events\UserCreatedEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class AccountEventServiceProvider extends ServiceProvider {

    protected $listen = [

    ];

    public function boot() {
        parent::boot();

        //
    }

}

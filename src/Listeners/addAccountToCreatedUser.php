<?php

namespace ConfrariaWeb\Account\Listeners;

use Auth;
use ConfrariaWeb\User\Events\UserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Config;

class addAccountToCreatedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $event->user->update(['account_id' => Auth::user()->account_id]);
    }
}

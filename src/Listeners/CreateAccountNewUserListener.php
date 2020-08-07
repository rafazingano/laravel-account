<?php

namespace ConfrariaWeb\Account\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;

class CreateAccountNewUserListener
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $request = request()->all();
        if(!isset($request['account_id']) && !Auth::check()){
            $request['sync']['users'] = $event->user->id;
            $request['user_id'] = $event->user->id;
            $request['plan_id'] = isset($request['plan_id'])? $request['plan_id'] : config('cw_account.plan_default');
            $account = resolve('AccountService')->create($request);
        }
    }
}

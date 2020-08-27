<?php

namespace ConfrariaWeb\Account\Listeners;

use Auth;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Config;

class addAccountToRegisteredUser
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
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if (!isset($event->account_id)) {
            $request = request()->all();

            if (!Auth::check()) {
                $data = [];
                $data['plan_id'] = isset($request['plan_id'])? $request['plan_id'] : config('cw_account.plan_default');
                $account = resolve('AccountService')->create($data);
            }
            
            $account_id = isset($account)? $account->id : Config::get('cw_account.account_default', 1);
            $event->user->update(['account_id' => $account_id ]);
        }
    }
}

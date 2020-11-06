<?php

namespace ConfrariaWeb\Account\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class UserAccountObserver
{

    /**
     * Handle the confraria web acl models role "creating" event.
     *
     * @param \ConfrariaWeb\Acl\Models\Role  #role
     * @return void
     */
    public function creating(User $user)
    {

    }


    /**
     * Handle the user "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        $account = Session::get('account');
        $account_id = isset($account) ? $account->id : Config::get('cw_account.default.account');
        if ($account_id) {
            $user->accounts()->sync($account_id);
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}

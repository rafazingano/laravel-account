<?php

namespace ConfrariaWeb\Account\Observers;

use App\Models\User;

class UserObserver
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
        /*if (existsAccount()) {
            $accountId = accountID();
            $user->sync($accountId);
        }*/
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

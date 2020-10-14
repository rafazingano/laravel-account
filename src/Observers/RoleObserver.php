<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Acl\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleObserver
{

    /**
     * Handle the confraria web acl models role "retrieved" event.
     *
     * @param \ConfrariaWeb\Acl\Models\Role  #role
     * @return void
     */
    public function retrieved(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web acl models role "creating" event.
     *
     * @param \ConfrariaWeb\Acl\Models\Role  #role
     * @return void
     */
    public function creating(Role $role)
    {
        //$role->account_id = Auth::user()->account_id;
    }

    /**
     * Handle the confraria web acl models role "created" event.
     *
     * @param \ConfrariaWeb\Acl\Models\Role  #role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web acl models role "updated" event.
     *
     * @param \Role $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web acl models role "deleted" event.
     *
     * @param \Role $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web acl models role "restored" event.
     *
     * @param \Role $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web acl models role "force deleted" event.
     *
     * @param \Role $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}

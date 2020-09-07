<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Entrust\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleObserver
{

    /**
     * Handle the confraria web entrust models role "retrieved" event.
     *
     * @param \ConfrariaWeb\Entrust\Models\Role  #role
     * @return void
     */
    public function retrieved(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web entrust models role "creating" event.
     *
     * @param \ConfrariaWeb\Entrust\Models\Role  #role
     * @return void
     */
    public function creating(Role $role)
    {
        $role->account_id = Auth::user()->account_id;
    }

    /**
     * Handle the confraria web entrust models role "created" event.
     *
     * @param \ConfrariaWeb\Entrust\Models\Role  #role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web entrust models role "updated" event.
     *
     * @param \Role $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web entrust models role "deleted" event.
     *
     * @param \Role $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web entrust models role "restored" event.
     *
     * @param \Role $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the confraria web entrust models role "force deleted" event.
     *
     * @param \Role $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}

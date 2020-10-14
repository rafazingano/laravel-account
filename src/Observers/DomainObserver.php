<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Domain\Models\Domain;

class DomainObserver
{
    /**
     * Handle the domain "created" event.
     *
     * @param  \ConfrariaWeb\Domain\Models\Domain  $domain
     * @return void
     */
    public function created(Domain $domain)
    {
        $account = Session::get('account');
        if($account ) {
            $domain->accounts()->sync($account->id);
        }
    }

    /**
     * Handle the domain "updated" event.
     *
     * @param  \ConfrariaWeb\Domain\Models\Domain  $domain
     * @return void
     */
    public function updated(Domain $domain)
    {
        //
    }

    /**
     * Handle the domain "deleted" event.
     *
     * @param  \ConfrariaWeb\Domain\Models\Domain  $domain
     * @return void
     */
    public function deleted(Domain $domain)
    {
        //
    }

    /**
     * Handle the domain "restored" event.
     *
     * @param  \ConfrariaWeb\Domain\Models\Domain  $domain
     * @return void
     */
    public function restored(Domain $domain)
    {
        //
    }

    /**
     * Handle the domain "force deleted" event.
     *
     * @param  \ConfrariaWeb\Domain\Models\Domain  $domain
     * @return void
     */
    public function forceDeleted(Domain $domain)
    {
        //
    }
}

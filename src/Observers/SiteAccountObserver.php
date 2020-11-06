<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Site\Models\Site;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SiteAccountObserver
{

    /**
     * Handle the site "creating" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function creating(Site $site)
    {

    }

    /**
     * Handle the site "created" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function created(Site $site)
    {
        $account = Session::get('account');
        $account_id = isset($account) ? $account->id : Config::get('cw_account.default.account');
        if ($account_id) {
            $site->accounts()->sync($account_id);
        }
    }

    /**
     * Handle the site "updated" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function updated(Site $site)
    {
        //
    }

    /**
     * Handle the site "deleted" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function deleted(Site $site)
    {
        //
    }

    /**
     * Handle the site "restored" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function restored(Site $site)
    {
        //
    }

    /**
     * Handle the site "force deleted" event.
     *
     * @param \ConfrariaWeb\Site\Models\Site $site
     * @return void
     */
    public function forceDeleted(Site $site)
    {
        //
    }
}

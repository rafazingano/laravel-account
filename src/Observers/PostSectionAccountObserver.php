<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Post\Models\PostSection;

class PostSectionAccountObserver
{
    /**
     * Handle the post section "created" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function created(PostSection $postSection)
    {
        $account = account();
        if ($account) {
            $postSection->accounts()->sync($account->id);
        }
    }

    /**
     * Handle the post section "updated" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function updated(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function deleted(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "restored" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function restored(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "force deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function forceDeleted(PostSection $postSection)
    {
        //
    }
}

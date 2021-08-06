<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Post\Models\PostCategory;

class PostCategoryAccountObserver
{
    /**
     * Handle the post category "created" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostCategory  $postCategory
     * @return void
     */
    public function created(PostCategory $postCategory)
    {
        $account = account();
        if ($account) {
            $postCategory->accounts()->sync($account->id);
        }
    }

    /**
     * Handle the post category "updated" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostCategory  $postCategory
     * @return void
     */
    public function updated(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostCategory  $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "restored" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostCategory  $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "force deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostCategory  $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        //
    }
}

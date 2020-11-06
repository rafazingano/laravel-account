<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\Post\Models\Post;

class PostAccountObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \ConfrariaWeb\Post\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $account = account();
        if ($account) {
            $post->accounts()->sync($account->id);
        }
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \ConfrariaWeb\Post\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \ConfrariaWeb\Post\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}

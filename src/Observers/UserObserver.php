<?php

namespace ConfrariaWeb\Account\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Config;

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
        /*
        $accounts = request()->accounts;
        $account = account();
        $account_id = $account? $account->id : NULL;
        $plan_id = request()->plan_id?? Config::get('cw_account.default.plan');
        if(!$accounts){
            $a = resolve('AccountService')->create([
                'parent_id' => $account_id,
                'plan_id' => $plan_id
            ]);
            if(!$a->get('error')){
                $accounts[] = $a->get('obj')->id;
            }
        }
        //$user->setAttribute('accounts', $accounts?? NULL);
        //request()->accounts = $accounts?? NULL;
        */
    }


    /**
     * Handle the user "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        if($user->accounts->isEmpty()){
            $account = account();
            $plan_id = request()->plan_id?? Config::get('cw_account.default.plan');
            $a = resolve('AccountService')->create([
                'parent_id' => $account->id?? NULL,
                'plan_id' => $plan_id
            ]);
            if(!$a->get('error')){
                $user->accounts()->sync($a->get('obj')->id);
            }
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
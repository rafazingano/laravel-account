<?php

namespace ConfrariaWeb\Account\Services;

use Carbon\Carbon;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Account\Notifications\AccountCreated;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use kamermans\OAuth2\Utils\Collection;

class AccountService
{
    use ServiceTrait;

    public function __construct(AccountContract $account)
    {
        $this->obj = $account;
    }

    public function prepareData(array $data, $obj = NULL)
    {
        //$data['parent_id'] = $data['parent_id']?? Auth::id();
        //$data['password'] = Hash::make('secret');
        return $data;
    }

    public function executeBefore(array $data)
    {
        /*$objUser = resolve('UserService')->create($data);
        if(!$objUser->has('obj') || $objUser->get('obj') === NULL){
            return collect([
                'error' => true,
                'status' => 'Erro ao criar o usuário'
            ]);
        }
        $this->data['sync']['user_id'] = $objUser->get('obj')->id;*/
        return collect(['error' => false]);
    }

    public function executeAfter(array $data, $obj = NULL)
    {
        /*foreach($obj->users as $user){
            //$user->notify(new AccountCreated());
        }*/
        return $obj;
    }

    public function generateInvoices(){
        /*$accounts = resolve('AccountService')->where(['status' => 1])->get();
        foreach($accounts as $account){
            if($account->plan->price <= 0){
                continue;
            }

            $data = [
                'account_id' => $account->id,
                'user_id' => $account->users()->oldest()->first()->id,
                'code' => Str::random(10),
                'price' => $account->plan->price,
                'due_date' => Carbon::now()->addDays(5)
            ];
            resolve('InvoiceService')->create($data);
        }*/
    }

}

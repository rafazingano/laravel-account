<?php

namespace ConfrariaWeb\Account\Services;

use Carbon\Carbon;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class AccountService
{
    use ServiceTrait;

    public function __construct(AccountContract $account)
    {
        $this->obj = $account;
    }

    public function generateInvoices(){
        $accounts = resolve('AccountService')->where(['status' => 1])->get();
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
        }
    }

}

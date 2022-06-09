<?php

namespace ConfrariaWeb\Account\Services;

use ConfrariaWeb\Account\Models\Account;

class AccountService
{

    public $response;

    public function __construct()
    {
        
    }

    public function create($data){
        return Account::create($data);
    }

    public function update($data, $id){
        $account = Account::find($id);
        return $account->update($data);
    }

}

<?php

namespace ConfrariaWeb\Account\Services;

use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class AccountService
{
    use ServiceTrait;

    public function __construct(AccountContract $account)
    {
        $this->obj = $account;
    }

}

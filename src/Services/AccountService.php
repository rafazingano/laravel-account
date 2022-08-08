<?php

namespace ConfrariaWeb\Account\Services;

use ConfrariaWeb\Account\Models\Account;
use ConfrariaWeb\User\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccountService
{

    protected $account;
    protected $userService;

    public function __construct(
        Account $account,
        UserService $userService
    ) {
        $this->account = $account;
        $this->userService = $userService;
    }

    public function all()
    {
        return $this->account->all();
    }

    public function find($id)
    {
        return $this->account->find($id);
    }

    public function paginate($perPage = 15)
    {
        return $this->account->paginate($perPage);
    }

    public function create($data = [])
    {
        if (empty($data['name'])) {
            $data['name'] = $this->createName($data);
        }

        if (empty($data['plan_id'])) {
            $data['plan_id'] = config('cw_plan.defaults.plan.id', 1);
        }

        if (empty($data['parent_id']) && Auth::check()) {
            $data['parent_id'] = Auth::user()->account->id ?? null;
        }

        return $this->account->create($data);
    }

    private function createName($data)
    {
        if (empty($data['name']) && Auth::check()) {
            return  Auth::user()->name;
        }

        return (string) Str::uuid();
    }

    public function update($id, $data)
    {
        $account = $this->account->find($id);
        return $account->update($data);
    }
}

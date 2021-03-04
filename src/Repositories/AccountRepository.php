<?PHP

namespace ConfrariaWeb\Account\Repositories;

use ConfrariaWeb\Account\Models\Account;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class AccountRepository implements AccountContract
{
    use RepositoryTrait;

    function __construct(Account $account)
    {
        $this->obj = $account;
    }

    public function sync($obj, array $data)
    {
        $obj->users()->sync($data);
    }

}

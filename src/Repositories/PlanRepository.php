<?PHP

namespace ConfrariaWeb\Account\Repositories;

use ConfrariaWeb\Account\Contracts\PlanContract;
use ConfrariaWeb\Account\Models\Plan;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PlanRepository implements PlanContract
{
    use RepositoryTrait;

    function __construct(Plan $plan)
    {
        $this->obj = $plan;
    }

}

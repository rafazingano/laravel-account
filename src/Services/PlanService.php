<?php

namespace ConfrariaWeb\Account\Services;

use ConfrariaWeb\Account\Contracts\PlanContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class PlanService
{
    use ServiceTrait;

    public function __construct(PlanContract $plan)
    {
        $this->obj = $plan;
    }

}

<?php

namespace ConfrariaWeb\Account\Observers;

use ConfrariaWeb\RealEstate\Models\Property;

class RealEstatePropertyObserver
{
    public function created(Property $property)
    {
        $account = account();
        if (isset($account) && $account->id) {
            $property->accounts()->sync($account->id);
        }
    }
}

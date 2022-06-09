<?php

namespace ConfrariaWeb\Account\Traits;

trait AccountTrait
{
    public function account()
    {
        return $this->belongsTo('ConfrariaWeb\Account\Models\Account');
    }
}

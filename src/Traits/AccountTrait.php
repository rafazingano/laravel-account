<?php

namespace ConfrariaWeb\Account\Traits;

trait AccountTrait
{
    public function accounts()
    {
        return $this->belongsToMany('ConfrariaWeb\Account\Models\Account');
    }
}

<?php

namespace ConfrariaWeb\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{

    use SoftDeletes;

    protected $table = 'account_plans';

    protected $fillable = [
        'title',
    ];

}

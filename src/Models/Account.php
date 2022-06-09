<?php

namespace ConfrariaWeb\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'plan_id',
        'parent_id',
        'status'
    ];

    public function plan()
    {
        return $this->belongsTo('ConfrariaWeb\Account\Models\Plan');
    }
    
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}

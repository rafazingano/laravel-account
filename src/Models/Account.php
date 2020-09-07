<?php

namespace ConfrariaWeb\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'plan_id', 'user_id'
    ];
    
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

<?php

namespace ConfrariaWeb\Account\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
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

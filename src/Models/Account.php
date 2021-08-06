<?php

namespace ConfrariaWeb\Account\Models;

use ConfrariaWeb\Account\Scopes\ParentScope;
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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ParentScope);
    }

    public function plan()
    {
        return $this->belongsTo('ConfrariaWeb\Account\Models\Plan');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}

<?php

namespace ConfrariaWeb\Account\Models;

use App\Models\User;
use ConfrariaWeb\Financial\Traits\InvoiceTrait;
use ConfrariaWeb\Plan\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

    use SoftDeletes, InvoiceTrait;

    protected $fillable = [
        'name', 'status', 'parent_id', 'plan_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

}

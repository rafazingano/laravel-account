<?php

namespace ConfrariaWeb\Account\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parent extends Model
{

    use SoftDeletes;

    protected $table = 'accounts';

    protected $fillable = [
        'status', 'parent_id', 'plan_id'
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}

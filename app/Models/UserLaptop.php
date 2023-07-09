<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLaptop extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_laptops_pivot', 'user_laptop_id', 'user_id');
    }

    public function laptopCharger()
    {
        return $this->morphMany(UserCharger::class, 'chargeable');
    }
}

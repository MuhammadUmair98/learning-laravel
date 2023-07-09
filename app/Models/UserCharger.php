<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCharger extends Model
{
    use HasFactory;


    public function chargeable()
    {
        return $this->morphTo('chargeable');
    }
}

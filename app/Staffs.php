<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'mobile', 'email', 'address'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'contact_no',
        'email'
    ];

    public function receipts()
    {
        return $this->hasMany('\App\Receipt', 'id');
    }
}

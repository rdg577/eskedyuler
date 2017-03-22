<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'number',
        'series_number',
        'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo('\App\Branch', 'branch_id');
    }
}

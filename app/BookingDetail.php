<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'service_id',
        'staff_id'
    ];

    public function service() {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function staff() {
        return $this->belongsTo('App\Staffs', 'staff_id');
    }
}

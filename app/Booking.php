<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'email',
        'mobile',
        'note',
        'event_date_time',
        'status_id'
    ];

    public function details() {
        return $this->hasMany('App\BookingDetail');
    }

    public function clientFullname() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function status() {
        return $this->belongsTo('App\Status', 'status_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'num_of_guests',
        'arrival',
        'departure',
        'name_of_guests',
        'phone_number_of_guests',
        'loction_of_guests'
    ];

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}

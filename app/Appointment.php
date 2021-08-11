<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public function doctor() {
        // belongs to the user_id of the users table
        return $this->belongsTo(User::class,'user_id','id');
    }
}

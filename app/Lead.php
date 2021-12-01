<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    // fillable
    protected $fillable = ['apartment_id', 'name', 'email', 'message'];

    // entity relation 
    public function apartments() {
        return $this->belongsTo('App\Apartment');
    }
}

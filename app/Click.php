<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    // fillable
    protected $fillable = ['ip_address', 'apartment_id'];

    // entity relation 
    public function apartments() {
        return $this->belongsTo('App\Apartment');
    }
}

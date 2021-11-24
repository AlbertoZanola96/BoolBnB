<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    // fillable
    protected $fillable = ['path'];

    // entity relation 
    public function apartments() {
        return $this->belongsTo('App\Apartment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model

{
    // fillable
    protected $fillable = ['name', 'description', 'num_rooms', 'num_beds', 'num_bathrooms', 'square_meters', 'address', 'lat', 'lon', 'slug'];

    // entity relation 
    public function users() {
        return $this->belongsTo('App\Users');
    }

    public function leads() {
        return $this->hasMany('App\Lead');
    }

    public function pictures() {
        return $this->hasMany('App\Picture');
    }

    public function clicks() {
        return $this->hasMany('App\Click');
    }

    public function services() {
        return $this->belongsToMany('App\Service');
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor');
    }
}

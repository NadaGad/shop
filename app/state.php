<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table = 'states';

    protected $primaryKey = 'id';


    public function cities(){
        return $this->hasMany(city::class, 'state_id', 'id');
    }

    public function country(){
        return $this->belongsTo(country::class, 'country_id', 'id');
    }
}

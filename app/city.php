<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'cities';

    protected $primaryKey = 'id';


    public function country(){
        return $this->belongsTo(country::class, 'country_id', 'id');
    }

    public function state(){
        return $this->belongsTo(state::class, 'state_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';

    protected $primaryKey = 'id';


    public function cities(){
        return $this->hasMany(city::class, 'country_id', 'id');
    }

    public function states(){
        return $this->hasMany(state::class, 'country_id', 'id');
    }
}



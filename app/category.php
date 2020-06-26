<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'image_direction', 'image_url'];

    public function product(){
        return $this->hasMany(product::class);
    }
}

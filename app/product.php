<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'title','description','price', 'quantity' ,'total','discount','options',
    ];

    public function images(){
        return $this->hasMany(image:: class);
    }

    public function reviews(){
        return $this->hasMany(review::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function tags(){
        return $this->belongsToMany(tag::class);
    }

    public function hasunit(){
        return $this->belongsTo(unit::class,'uint', 'id');
    }

    public function jsonoptions(){
        return json_decode($this->options) ;
    }
}

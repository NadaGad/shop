<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = [
        'tag',
    ];

    public function products(){
        return $this->belongsToMany(product::class);
    }
}

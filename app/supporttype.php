<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supporttype extends Model
{
    protected $fillable = [
        'type',
    ];

    public function contactsupport(){
        return $this->hasMany(contactsupport::class);
    }
}

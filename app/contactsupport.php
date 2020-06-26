<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactsupport extends Model
{
    protected $fillable = [
        'title','message','supporttype_id','user_id','order_id',
    ];

    public function supporttype(){
        return $this->hasOne(supporttype::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

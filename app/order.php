<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id','userorder_num','payment_id','order_date',
    ];

    public function user(){
        return $this->belongsTo(User:: class);
    }

   /* public function cart(){
        return $this->hasOne(cart::class);
    }*/
    public function payment(){
        return $this->hasOne(payment::class);
    }

    public function cartelements(){
        return $this->hasMany(cart::class);
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'product_id','title','description','price','quantity','total','discount','user_id','confirmed',
        'order_id','userorder_num',
    ];

    public function user(){
        return $this->belongsTo(User:: class);
    }


    public function order(){
        return $this->belongsTo(order:: class);
    }


}

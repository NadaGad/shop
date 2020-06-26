<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
   protected $fillable = [
       'street_name','street_number','city','state','country','post_code',
   ];

    public function user(){
        return $this->belongsTo(User:: class);
    }
}

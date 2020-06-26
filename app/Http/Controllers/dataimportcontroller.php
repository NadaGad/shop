<?php

namespace App\Http\Controllers;

use App\unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataimportcontroller extends Controller
{
    public function importUnits(){
       $units = [
            "te" => "tote",
            "un" => "unit",
            "yd" => "yard",
            "ta" => "tte",
            "tk" => "tank",
            "ty" => "tray",


        ];

          foreach ($units as $key => $value){
           DB::table('units')->insert([
               'unit_code' => $key,
               'unit_name' => $value,
               'created_at'=> now(),
               'updated_at'=> now(),
           ]);


           /**foreach ($units as $key => $value){

               $unit = new unit();
               $unit->unit_code = $key;
               $unit->unit_name = $value;
               $unit->save();
           }*/
       }

    }
}

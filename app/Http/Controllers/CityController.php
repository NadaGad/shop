<?php

namespace App\Http\Controllers;

use App\city;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = city::with(['state','country'])->paginate(16);
        return $cities;
    }
}

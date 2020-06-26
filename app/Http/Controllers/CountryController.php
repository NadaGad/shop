<?php

namespace App\Http\Controllers;

use App\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = country::paginate(16);
        return $countries;
    }
}

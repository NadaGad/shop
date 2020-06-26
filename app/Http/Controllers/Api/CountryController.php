<?php

namespace App\Http\Controllers\Api;

use App\country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResourse;
use App\Http\Resources\StateResourse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        return CountryResourse::collection(country::paginate());

    }

    public function showstates($id){
        $country = country::find($id);
        return StateResourse::collection($country->states->paginate);

    }

    public function showcities($id){
        $country = country::find($id);
        return StateResourse::collection($country->cities->paginate);

    }
}

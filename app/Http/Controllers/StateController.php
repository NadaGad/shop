<?php

namespace App\Http\Controllers;

use App\state;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(){
        $states = state::with(['country'])->paginate(16);
        return $states;
    }
}

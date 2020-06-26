<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = role::all();
        return $roles;
    }
}

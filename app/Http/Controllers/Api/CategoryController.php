<?php

namespace App\Http\Controllers\Api;

use App\category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResourse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
       return CategoryResourse::collection(category::paginate());

    }

    public function show($id){
        return new CategoryResourse(category::find($id));

    }
}

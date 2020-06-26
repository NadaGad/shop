<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResourse;
use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return TagResourse::collection(tag::paginate());

    }

    public function show($id){
        return new TagResourse(tag::find($id));

    }
}

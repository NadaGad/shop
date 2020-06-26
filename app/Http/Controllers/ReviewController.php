<?php

namespace App\Http\Controllers;

use App\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = review::with(['product','user'])->paginate(16);
        return $reviews;
    }
}

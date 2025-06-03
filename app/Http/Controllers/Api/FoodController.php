<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
     public function index(){
       $food = Food::with('category')->get();
       return $food;
    }
}

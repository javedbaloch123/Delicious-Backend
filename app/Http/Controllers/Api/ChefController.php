<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index(){
        
         $chefs = Chef::get();
         return $chefs; 
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
   public function index(){

         $slot = Slot::get();
         return $slot;
    }


    public function fetchTime(Request $request){
        
        $slot = Slot::where('date',$request->date)->first();
        return $slot->initial_time .'-'. $slot->End_time;
    }
}

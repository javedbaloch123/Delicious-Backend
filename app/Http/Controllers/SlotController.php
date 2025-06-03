<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function index(){

        $slots = Slot::get();
        return view('slot',['slots'=>$slots]);
    }

    public function addSlot(){

        return view('addslot');
    }


     public function store(Request $request)
    { 
         
        $validate = Validator::make($request->all(), [
            'date' => 'required',
            'itime' => 'required',
            'etime' => 'required',
            'status' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $chef = new Slot();
        $chef->date = $request->date;
        $chef->initial_time = $request->itime;
        $chef->End_time = $request->etime;
        $chef->is_booked = $request->status;
       

 
        $chef->save();
        return response()->json([
            'is_booked' => true,
        ]);
    }

     public function delete($id){

        $slot = Slot::find($id);
        $slot->delete();
        return response()->json([
            'status'=>true
        ]);
    }
}

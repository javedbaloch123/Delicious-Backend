<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|max:10',
            'date'=>'required',
            'time'=>'required',
            'message'=>'required|min:100',
            'people'=>'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'error'=>$validate->errors()
            ]);
            
        }

        $book = new Book();
        $book->name = $request->name;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->message = $request->message;
        $book->people = $request->people;
        $book->date = $request->date;
        $book->time = $request->time;
         

        $slot = Slot::where('date',$request->date)->first();
        $slot->is_booked = 'false';
        $book->slot_id = $slot->id;
    
        $book->save();
        $slot->save();

        return response()->json([
            'status'=>true,
        ]);
        
    }
}

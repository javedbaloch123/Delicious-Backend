<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChefController extends Controller
{
    public function index(){

        $chefs =  Chef::get();
        return view('chef',['chefs'=>$chefs]);

    }

     public function addChef(){

    
        return view('addchef');

    }

    public function store(Request $request)
    { 
         
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image',
            'profession' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $chef = new Chef();
        $chef->name = $request->name;
        $chef->profession = $request->profession;
       

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('chefs_images'),$imageName);

            $chef->image = $imageName;
        }
 
        $chef->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function delete($id){

        $chef = Chef::find($id);
        $chef->delete();
        return response()->json([
            'status'=>true
        ]);
    }
}

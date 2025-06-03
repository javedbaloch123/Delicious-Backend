<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    { 
        $food = Food::with('category')->get();
        return view('Food',['foods'=>$food]);
    }

    public function addFood()
    {
        $categories = Category::get();
        return view('AddFood',['categories'=>$categories]);
    }

    public function store(Request $request)
    { 
         
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'category' => 'required',
            'image' => 'required|image',
            'price' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $food = new Food();
        $food->name = $request->name;
        $food->desc = $request->desc;
        $food->price = $request->price;
        $food->category_id = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_images'),$imageName);

            $food->image = $imageName;
        }

        $food->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function edit($id){
          $food = Food::find($id);
         $categories = Category::get();
         return view('EditFood',['food'=>$food,'categories'=>$categories]);
    }


      public function update(Request $request){

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'category' => 'required',
            'image' => 'nullable|image',
            'price' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $food = Food::find($request->id);
        $food->name = $request->name;
        $food->desc = $request->desc;
        $food->price = $request->price;
        $food->category_id = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_images'),$imageName);

            $food->image = $imageName;
        }

        $food->save();
        return response()->json([
            'status' => true,
        ]);
    }

    public function delete($id){

        $food = Food::find($id);
        $food->delete();
        return response()->json([
            'status'=>true
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::get();
        return view('Category',['categories'=>$category]);
    }

     public function addCategory(){
        return view('AddCategory');
    }

     public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $food = new Category();
        $food->name = $request->name;
    
        $food->save();
        return response()->json([
            'status' => true,
        ]);
    }

      public function edit($id){

          $category = Category::find($id);  
         return view('EditCategory',['category'=>$category]);
    }


     public function update(Request $request){

        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validate->errors()
            ]);
        }

        $food = Category::find($request->id);
        $food->name = $request->name;
    
        $food->save();
        return response()->json([
            'status' => true,
        ]);
    }

     public function delete($id){

        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status'=>true
        ]);
    }
}

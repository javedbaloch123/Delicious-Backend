<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChefController as ApiChefController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\ChefController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/category',[CategoryController::class, 'index']);
Route::get('/food',[FoodController::class, 'index']);
Route::post('/contact',[ContactController::class, 'store']);
Route::get('/chef',[ApiChefController::class, 'index']);

Route::get('/slot',[SlotController::class, 'index']);
Route::post('/book',[BookController::class, 'store']);
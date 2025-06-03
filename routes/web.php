<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SlotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin');
});

Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::get('/food',[FoodController::class, 'index'])->name('food');
Route::get('/slot',[SlotController::class, 'index'])->name('slot');
Route::get('/chef',[ChefController::class, 'index'])->name('chef');

Route::post('/process-food',[FoodController::class, 'store'])->name('process.form');
Route::post('/process-category',[CategoryController::class, 'store'])->name('process.category');
Route::post('/process-chef',[ChefController::class, 'store'])->name('process.chef');
Route::post('/process-slot',[SlotController::class, 'store'])->name('process.slot');
Route::get('/edit-food/{id}',[FoodController::class, 'edit'])->name('edit.food');
Route::get('/edit-category/{id}',[CategoryController::class, 'edit'])->name('edit.cat');
Route::post('/update-food',[FoodController::class, 'update'])->name('update.form');
Route::get('/delete-food/{id}',[FoodController::class, 'delete'])->name('delete.food');
Route::get('/delete-chef/{id}',[ChefController::class, 'delete'])->name('delete.chef');
Route::get('/delete-slot/{id}',[SlotController::class, 'delete'])->name('delete.slot');
Route::post('/update-category',[CategoryController::class, 'update'])->name('update.cat');
Route::get('/delete-category/{id}',[CategoryController::class, 'delete'])->name('delete.cat');

Route::get('/add-food',[FoodController::class, 'addFood'])->name('add.food');
Route::get('/add-category',[CategoryController::class, 'addCategory'])->name('add.category');
Route::get('/add-slot',[SlotController::class, 'addSlot'])->name('add.slot');
Route::get('/add-chef',[ChefController::class, 'addChef'])->name('add.chef');
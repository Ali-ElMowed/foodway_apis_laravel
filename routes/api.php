<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;




Route::get('/restaurants/{id?}', [RestaurantController::class, 'getAllRestaurants']);
Route::post('/add_resto', [RestaurantController::class, 'addResto']);
Route::post('/update_resto/{id?}', [RestaurantController::class, 'updateResto']);
Route::delete('/delete_resto/{id}', [RestaurantController::class, 'destroyResto']);



Route::post('/add_user', [UserController::class, 'addUser']);



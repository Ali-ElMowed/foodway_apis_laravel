<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;



Route::get('/restaurants/{id?}', [RestaurantController::class, 'getAllRestaurants']);
Route::post('/add_resto', [RestaurantController::class, 'addResto']);

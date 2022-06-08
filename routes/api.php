<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;




Route::get('/restaurants/{id?}', [RestaurantController::class, 'getAllRestaurants']);
Route::post('/add_resto', [RestaurantController::class, 'addResto']);
Route::post('/update_resto/{id?}', [RestaurantController::class, 'updateResto']);
Route::delete('/delete_resto/{id}', [RestaurantController::class, 'destroyResto']);
Route::post('/add_review', [RestaurantController::class, 'addReview']);
Route::get('/reviews/{id?}', [RestaurantController::class, 'getAllReviews']);
Route::delete('/delete_review/{id}', [RestaurantController::class, 'destroyReview']);



Route::post('/add_user', [UserController::class, 'addUser']);
Route::post('/update_user/{id}', [UserController::class, 'updateUser']);
Route::delete('/delete_user/{id}',[UserController::class,'destroyUser']);




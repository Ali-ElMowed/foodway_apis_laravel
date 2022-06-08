<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\City;
use App\Models\Category;



class RestaurantController extends Controller
{

    public function getAllRestaurants($id = null)
    {

        if ($id != null) {
            $restos = Restaurant::find($id);
        } else {
            $restos = Restaurant::all();
        }

        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }

    public function addResto(Request $request)
    {
        $resto = new Restaurant;
        $resto->resto_name = $request->resto_name;
        $resto->phone_number = $request->phone_number;
        $resto->description = $request->description;
        $resto->cat_id = $request->cat_id;
        $resto->city_id = $request->city_id;
        $resto->image = $request->image;
        $resto->save();

        return response()->json([
            "status" => "success"
        ], 200);
    }

    public function updateResto(Request $request = null, $resto_id)
    {
        $resto = Restaurant::find($resto_id);

        if ($resto) {

            $resto->resto_name = $request->resto_name;
            $resto->phone_number = $request->phone_number;
            $resto->description = $request->description;
            $resto->cat_id = $request->cat_id;
            $resto->city_id = $request->city_id;
            $resto->image = $request->image;
            $resto->update();

            return response()->json([
            "status" => "success"
        ], 200);
        }else{
            return response()->json([
                "status" => "No resturant found"
            ], 404);
        }
    }

    public function destroyResto($id){

        $resto = Restaurant::find($id);

        if($resto){

            $resto->delete();
            return response()->json([
                'status'=> 'deleted'
            ],200);

        }else{

            return response()->json([
                'status'=>"No  resto found"
            ],404);

        }
    }

    public function addReview(Request $request)
    {
        $review = new Review;
        $review->rev_text = $request->rev_text;
        $review->user_id = $request->user_id;
        $review->resto_id = $request->resto_id;
        $review->status = $request->status;
        $review->save();

        return response()->json([
            "status" => "success"
        ], 200);
    }

    public function getAllReviews($id = null)
    {

        if ($id != null) {
            $review = Review::find($id);
        } else {
            $review = Review::all();
        }

        return response()->json([
            "status" => "Success",
            "review" => $review
        ], 200);
    }

    public function destroyReview($id){

        $review = Review::find($id);

        if($review){

            $review->delete();
            return response()->json([
                'status'=> 'deleted'
            ],200);

        }else{

            return response()->json([
                'status'=>"No  review found"
            ],404);

        }
    }

    public function addCity(Request $request)
    {
        $city = new City;
        $city->rev_text = $request->rev_text;
        $city->user_id = $request->user_id;
        $city->resto_id = $request->resto_id;
        $city->status = $request->status;
        $city->save();

        return response()->json([
            "status" => "success"
        ], 200);
    }

    public function getAllCities($id = null)
    {

        if ($id != null) {
            $city = City::find($id);
        } else {
            $city = City::all();
        }

        return response()->json([
            "status" => "Success",
            "city" => $city
        ], 200);
    }

    public function destroyCity($id){

        $city = City::find($id);

        if($city){

            $city->delete();
            return response()->json([
                'status'=> 'deleted'
            ],200);

        }else{

            return response()->json([
                'status'=>"No  city found"
            ],404);

        }
    }

    public function addCategory(Request $request)
    {
        $category = new Category;
        $category->rev_text = $request->rev_text;
        $category->user_id = $request->user_id;
        $category->resto_id = $request->resto_id;
        $category->status = $request->status;
        $category->save();

        return response()->json([
            "status" => "success"
        ], 200);
    }

    public function getAllCategories($id = null)
    {

        if ($id != null) {
            $category = Category::find($id);
        } else {
            $category = Category::all();
        }

        return response()->json([
            "status" => "Success",
            "category" => $category
        ], 200);
    }

    public function destroyCategory($id){

        $category = Category::find($id);

        if($category){

            $category->delete();
            return response()->json([
                'status'=> 'deleted'
            ],200);

        }else{

            return response()->json([
                'status'=>"No  category found"
            ],404);

        }
    }

}

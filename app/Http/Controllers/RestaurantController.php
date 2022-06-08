<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;


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
}

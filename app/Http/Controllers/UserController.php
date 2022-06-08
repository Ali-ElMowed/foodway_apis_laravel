<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function addUser(Request $request){
        $user = new User;
        $user -> first_name = $request->first_name;
        $user -> last_name = $request->last_name;
        $user -> password = $request->password;
        $user -> email = $request->email;
        $user -> gender = $request->gender;
        $user -> phone_number = $request -> phone_number;
        $user -> city_id = $request -> city_id;
        $user -> image = $request -> image;
        $user -> is_admin = $request->is_admin;
        $user->save();

        return response()->json([
            "status" => "success"
        ],200);
    }


}

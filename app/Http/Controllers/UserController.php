<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function addUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->city_id = $request->city_id;
        $user->image = $request->image;
        $user->is_admin = $request->is_admin;
        $user->save();

        return response()->json([
            "status" => "success"
        ], 200);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->phone_number = $request->phone_number;
            $user->city_id = $request->city_id;
            $user->image = $request->image;
            $user->is_admin = $request->is_admin;
            $user->update();

            return response()->json([
                "status" => "success"
            ], 200);
        } else {
            return response()->json([
                "status" => "No resturant found"
            ], 404);
        }
    }

    public function destroyUser($id){

        $user = User::find($id);

        if($user){
            
            $user->delete();
            return response()->json([
                'status'=> 'deleted'
            ],200);

        }else{

            return response()->json([
                'status'=>"No  user found"
            ],404);

        }
    }

    public function login(Request $request){

        $user = User::where('email','LIKE',);
        $user -> email = $request -> email;
        $user->password = Hash::make($request->password);
        $user -> save();
        
        return response()->json([
            'status'=>"Logged"
        ],200);

    }

}

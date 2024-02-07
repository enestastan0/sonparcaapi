<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user->password == $request->password){
            return response()->json(['message' => "Ok"]);

        }
        else{
            return response()->json(['message' => "No"]);

        }

    }

    public function register(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;

        $user = User::create([
            "email" => $email,
            "password" => $password,
            "name" => $name,
        ]);
        if($user){
            return response()->json(['message' => "Ok"]);

        }
        else{
            return response()->json(['message' => "No"]);

        }
       
    }
     

}
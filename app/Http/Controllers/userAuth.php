<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userAuth extends Controller
{
    public function login()
    {

    }

    public function signUp(Request $request)
    {
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["token"] = $user->craeteToken("MyApp")->plainTextToken;
        $user["name"] = $user->name;
        return ['success' => true, 'token' => $success];



    }
}

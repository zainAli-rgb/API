<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class userAuth extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "not found";
        } else {
            $success["token"] = $user->createToken("MyApp")->plainTextToken;
            $success["name"] = $user->name;
            return ['success' => true, 'token' => $success];
        }
    }

    public function signUp(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return "failed validation";
        }
        $input = $request->all();

        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["token"] = $user->createToken("MyApp")->plainTextToken;
        $success["name"] = $user->name;
        return ['success' => true, 'token' => $success];



    }
}

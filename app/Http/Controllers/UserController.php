<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

public function register(UserRegisterRequest $request){


        $user = new User();

        $user->name = $request->name;

        $user->password = bcrypt($request->password);

        $user->email = $request->email;

        $user->save();

        return response()->json($user);

}

public function login(LoginUserRequest $request){

    $credientials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (!Auth::attempt($credientials)) {

        return $this->errorResponse('Incorrect Username Or password', 401);
    }

    $user = User::find(Auth::user()->id);

    $token = $user->createToken('token')->accessToken;

    $user['token'] = $token;

    return response()->json($user);

}

}

<?php

namespace App\Http\Controllers;
use \App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
    public function getuser($userId)
    {
        $user = User::where('id', $userId)->first();

        $params = [
            'name' => $user->name,
            'login' => $user->login
        ];

        return view('user_test', $params);

    }
}

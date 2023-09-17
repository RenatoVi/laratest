<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthGerenteController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::guard('gerentes')->attempt($request->only('email','password'))) {
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = Auth::guard('gerentes')->user()->createToken('authToken')->accessToken;
        return response(['access_token' => $accessToken]);
    }
}

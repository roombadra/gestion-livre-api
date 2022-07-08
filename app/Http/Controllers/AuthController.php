<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'Email or password is incorrect'
            ], 401);
        }

        return response()->json([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

}

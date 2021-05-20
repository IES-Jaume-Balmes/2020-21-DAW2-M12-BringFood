<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokensController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'code' => 1,
                    'message' => 'Wrong validation',
                    'errors' => $validator->errors()
                ]
            ], 422);
        }

        $token = JWTAuth::attempt($credentials);

        if ($token) {
            return response()->json([
                'meta' => [
                    'success' => true,
                    'errors' => []
                ],
                'data' => [
                    'token' => $token,
                ]
                
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => ['Password incorrect for: '.$request->email]
                ]
            ], 401);
        }
        return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => ['Password incorrect for: '.$request->email]
                ]
            ], 401);
    }
}

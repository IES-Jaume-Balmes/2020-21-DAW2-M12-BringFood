<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\RequestOk;
use App\Api\RequestKo;
use App\Http\Requests\Api\User\LoginUserRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class TokensController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $token = JWTAuth::attempt($request->all());
        if ($token) {
        	$user = Auth::user();//user authentificated
        	return (new RequestOk($user,$token))->loginSuccessful();
        } 
        return (new RequestKo($request->email))->loginFail();
    }

    public function logout()
    {        
        $token = JWTAuth::getToken();
        try {
            $token = JWTAuth::invalidate($token);
            return (new RequestOk())->logoutSuccessful();
        } catch (JWTException $e) {
            return (new RequestKo())->logoutFail();
        }
    }

    public function isToken()
    {
    	$token = JWTAuth::getToken();
    	if($token){
    		return (new RequestOk())->isToken();
    	}
    	return (new RequestKo())->isToken();
    }
    /*
    public function refreshToken()
    {

        $token = JWTAuth::getToken();
        if($token){
        	try {
            $token = JWTAuth::refresh($token);
            return response()->json(['success' => true, 'token' => $token], 200);
        } catch (TokenExpiredException $ex) {
            // We were unable to refresh the token, our user needs to login again
            return response()->json([
                'code' => 3, 'success' => false, 'message' => 'Need to login again, please (expired)!'
            ]);
        } catch (TokenBlacklistedException $ex) {
            // Blacklisted token
            return response()->json([
                'code' => 4, 'success' => false, 'message' => 'Need to login again, please (blacklisted)!'
            ], 422);
        }
        }
        return response()->json([
                'success' => false, 
                'message' => 'Need to login again, please (expired)!']);

    }*/


}

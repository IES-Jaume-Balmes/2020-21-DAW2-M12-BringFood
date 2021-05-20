<?php

namespace App\Api;

class RequestOk
{
	private $object;
    private $token;
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct($object=null,$token=null)
    {
        $this->object=$object;
        $this->token=$token;
    }

    public function store()
    {
    	return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
            'data' => $this->object
        ],201);
    }

    public function update()
    {
    	return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
            'data' => $this->object
        ],200);//200 or 204. 200 when you need to show the model update, and 204 is not content.
    }

    public function show()
    {
    	return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
            'data' => $this->object
        ],200);
    }

    public function delete()
    {
    	return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
        ],200);//200 or 204
    }

    public function loginSuccessful()
    {
        return response()->json([
            'meta' => [
                'success' => true,
                'errors' => []
            ],
            'data' => [
                'user' => $this->object,
                'token' => $this->token,
            ]
        ],200);
    }

    public function logoutSuccessful()
    {
        return response()->json([
            'success' => true, 
            'message' => "You have successfully logged out."
        ], 200);
    }

    public function isToken()
    {
        //$token = JWTAuth::getToken();
        return response()->json([
            'data' => true
        ], 200);
    }

}

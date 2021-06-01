<?php

namespace App\Api;

class RequestKo
{
    private $object;
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct($object=null)
    {
        $this->object=$object;
    }

    public function noPossibleDelete()
    {
    	return response()->json([
            'meta' => [
                'success' => false,
                'errors' => ['no possible delete, have relations']
            ],
            'data' => $this->object
        ],409);//https://stackoverflow.com/questions/25122472/rest-http-status-code-if-delete-impossible
    }

    public function notFoundResource()
    {
    	return response()->json([
            'meta' => [
                'success' => false,
                'errors' => ['not found resource']
            ],
            //'data' => $this->object
        ],404);
    }

    public function loginFail()
    {
        return response()->json([
            'errors' => [
                'password'=>['password incorrect']
            ],
            'status'=>401
        ], 401);
        /*return response()->json([
            'errors' => 'password incorrect', 'status'=>401
        ], 401);*/

        /*return response()->json([
            'meta' => [
                'success' => false,
                'errors' => ['Password incorrect for: '.$this->object],
            ]
        ], 401);*/
    }

    public function logoutFail()
    {
    	return response()->json([
            'success' => false, 
            'message' => 'Failed to logout, please try again.'
        ], 422);
    }

    public function isToken()
    {
        return response()->json([
            'error' => false
        ], 404);
    }

    public function invalidDocument()
    {
        return response()->json([
            'errors' => [
                'document'=>['Document INVALID!!!']
            ],
            'status'=>401
        ], 401);
    }
}

<?php

namespace App\Api;

class RequestOk
{
	private $object;
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct($object)
    {
        $this->object=$object;
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

    public function noPossibleDelete()
    {
    	return response()->json([
            'meta' => [
                'success' => false,
                'errors' => ['no possible delete, have relations']
            ],
            'data' => $this->object
        ],200);//200 or 204
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
}

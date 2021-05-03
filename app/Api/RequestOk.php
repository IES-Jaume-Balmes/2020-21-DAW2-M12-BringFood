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
}

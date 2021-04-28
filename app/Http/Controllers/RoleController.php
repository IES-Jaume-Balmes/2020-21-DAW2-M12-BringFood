<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function saveRole(CreateRoleRequest $request)
    {
    	$role=Role::create([
    		'type' => $request->name,
    		'description' => $request->description,
    	]);
    	return response()->json([
			'meta' => [
				'success' => true,
				'errors' => []
			],
		    'data' => $role
		],201);
    }
}

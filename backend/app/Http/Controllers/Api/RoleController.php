<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Role\CreateRoleRequest;
use App\Models\Role;
use App\Api\RequestOk;
use App\Http\Requests\Api\Role\UpdateRoleRequest;
use App\Api\RequestKo;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return (new RequestOk($roles))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $role=Role::create([
            'type' => $request->type,
            'description' => $request->description,
        ]);
        return (new RequestOk($role))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return (new RequestOk($role))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update([
            'id' => $request->id,
            //'type' => $request->type, the type must not be updated
            'description' => $request->description,
        ]);
        return (new RequestOk($user))->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //No posible
    }
}

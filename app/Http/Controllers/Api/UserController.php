<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CreateUserRequest;
use App\Models\User;
use App\Api\RequestOk;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Models\AddressUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return (new RequestOk($users))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user=User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_document' => $request->type_document,
            'document' => $request->document,
            'prefix' => $request->prefix,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
        ]);
        return (new RequestOk($user))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return (new RequestOk($user))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            //'id' => $id,
            //'role_id' => $request->role_id,
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            //'password' => Hash::make($request->password),
            'type_document' => $request->type_document,
            'document' => $request->document,
            'prefix' => $request->prefix,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
        ]);
        return (new RequestOk($user))->update();
    }

    /**
     * Remove the specified resource from storage. If the id not exists return 404 not found like html
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        $addressUser=AddressUser::where('user_id',$user->id)->get();
        if(count($addressUser)>0){
            return (new RequestOk($addressUser))->noPossibleDelete();
        }
        //$user=User::find($id);
        if($user==null){
            return (new RequestOk($user))->notFoundResource();
        }
        $user->delete();
        return (new RequestOk($user))->delete();
    }
    /**
     * Remove the specified resource from storage. If the id not exists return 404 like api
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy($id)
    {   
        $addressUser=AddressUser::where('user_id',$id)->get();
        if(count($addressUser)>0){
            return (new RequestOk($addressUser))->noPossibleDelete();
        }
        $user=User::find($id);
        if($user==null){
            return (new RequestOk($user))->notFoundResource();
        }
        $user->delete();
        return (new RequestOk($user))->delete();
    }*/
}

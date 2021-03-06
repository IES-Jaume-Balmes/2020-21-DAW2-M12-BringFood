<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Client\CreateClientRequest;
use App\Models\User;
use App\Api\RequestOk;
use App\Api\RequestKo;
use Illuminate\Support\Facades\Hash;
use App\Util\DocumentValidation;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        //verify is document correct
        if($request->type_document=='CIF'){
            //VALIDAR CIF
            $documentValidation=new DocumentValidation($request->document);
            //if($documentValidation->is)
        }else if($request->type_document=='NIF' && $request->document!=''){
            //VALIDAR NIF
            $documentValidation=new DocumentValidation($request->document);
            if(!$documentValidation->isNIF()){
                return (new RequestKo())->invalidDocument();
            }
        }else if($request->type_document=='NIE' && $request->document!=''){
            //VALIDAR NIE
            $documentValidation=new DocumentValidation($request->document);
            if(!$documentValidation->isNIE()){
                return (new RequestKo())->invalidDocument();
            }
        }

        $user=User::create([
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
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

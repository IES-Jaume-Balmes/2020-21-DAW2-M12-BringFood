<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Address\CreateAddressRequest;
use App\Models\Address;
use App\Api\RequestOk;
use App\Api\RequestKo;
use App\Http\Requests\Api\Address\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::all();
        return (new RequestOk($addresses))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAddressRequest $request)
    {
        $address=Address::create([
            'via' => $request->via,
            'name' => $request->name,
            'number' => $request->number,
            'floor' => $request->floor,
            'door' => $request->door,
            'stair' => $request->stair,
            'zip_code' => $request->zip_code,
        ]);
        
        return (new RequestOk($address))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address=Address::find($id);
        return (new RequestOk($address))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update([
            'id' => $request->id,
            'via' => $request->via,
            'name' => $request->name,
            'number' => $request->number,
            'floor' => $request->floor,
            'door' => $request->door,
            'stair' => $request->stair,
            'zip_code' => $request->zip_code,
        ]);
        return (new RequestOk($address))->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addressUser=AddressUser::where('address_id',$id)->get();
        if(count($addressUser)>0){
            return (new RequestKo($addressUser))->noPossibleDelete();
        }
        $address=Address::find($id);
        if($address==null){
            return (new RequestKo())->notFoundResource();
        }
        $adress->delete();
        return (new RequestOk())->delete();
    }


}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Dish\CreateDishRequest;
use App\Models\Dish;
use App\Api\RequestOk;
use App\Http\Requests\Api\Dish\UpdateDishRequest;
use Carbon\Carbon;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes=Dish::all();
        return (new RequestOk($dishes))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //CreateDishRequest
    public function store(CreateDishRequest $request)
    {   
        $url_img=null;
        
        if($request->hasFile('img_url')){
            /*
            $nombre=$request->file('img_url')->getClientOriginalName();
            $destination='images'.DIRECTORY_SEPARATOR;
            $request->file('img_url')->move(public_path($ruta),$nombre);
            $url_img=public_path($ruta).$nombre;*/

            $ruta="C:".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."htdocs".DIRECTORY_SEPARATOR."bringfood".DIRECTORY_SEPARATOR."frontend".DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR;
            $mytime = Carbon::now();
            $mytimeNew= str_replace(":","",$mytime->toDateTimeString());
            $nombre=$mytimeNew.'_'.$request->file('img_url')->getClientOriginalName();
            $request->file('img_url')->move($ruta,$nombre);
            //$url_img=$ruta.$nombre;
            $url_img=$nombre;
        }else
        {
            return response()->json(["message" => "Select image first."]);
        }

        $dish=Dish::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'detail' => $request->detail,
            'img_url' => $url_img,
            'price' => $request->price,
        ]);
        return (new RequestOk($dish))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return (new RequestOk($dish))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $dish->update([
            'id' => $request->id,
            'name' => $request->name,
            'detail' => $request->detail,
            'img_url' => $request->img_url,
            'price' => $request->price,
        ]);
        return (new RequestOk($dish))->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        /*$dish=Dish::find($id);
        $dish->delete();
        return (new RequestOk($dish))->delete();*/
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Dish\CreateDishRequest;
use App\Models\Dish;
use App\Api\RequestOk;
use App\Http\Requests\Api\Dish\UpdateDishRequest;

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
    public function store(CreateDishRequest $request)
    {
        $dish=Dish::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'detail' => $request->detail,
            'img_url' => $request->img_url,
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

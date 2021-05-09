<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CreateFoodRequest;
use App\Models\Food;
use App\Api\RequestOk;
use App\Http\Requests\Api\UpdateFoodRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods=Food::all();
        return (new RequestOk($foods))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFoodRequest $request)
    {
        $food=Food::create([
            'order_id' => $request->order_id,
            'name' => $request->name,
            'detail' => $request->detail,
            'img_url' => $request->img_url,
            'price' => $request->price,
        ]);
        return (new RequestOk($food))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return (new RequestOk($food))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food->update([
            'id' => $request->id,
            'name' => $request->name,
            'detail' => $request->detail,
            'img_url' => $request->img_url,
            'price' => $request->price,
        ]);
        return (new RequestOk($food))->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        /*$food=Food::find($id);
        $food->delete();
        return (new RequestOk($food))->delete();*/
    }
}

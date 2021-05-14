<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Order\CreateOrderRequest;
use App\Models\Order;
use App\Api\RequestOk;
use App\Http\Requests\Api\Order\UpdateOrderRequest;
use Carbon;
use App\Models\DishOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return (new RequestOk($orders))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order=Order::create([
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
        ]);
        $dishOrder=DishOrder::create([
            'dish_id' => $request->dish_id,
            'order_id' => $order->id,
        ]);
        return (new RequestOk($order))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return (new RequestOk($order))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //$order=Order::find($id);
        $order->update([
            'id' => $request->id,
            'total_price' => $request->total_price,
            'date_request' => Carbon\Carbon::now(),
            'date_send' => $request->date_send,
            'date_deliver' => $request->date_deliver,
        ]);
        return (new RequestOk($order))->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order==null){
            return (new RequestOk($order))->notFoundResource();
        }
        $order->delete();
        return (new RequestOk($order))->delete();
    }
}

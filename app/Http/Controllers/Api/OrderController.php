<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CreateOrderRequest;
use App\Models\Order;
use App\Api\RequestOk;
use App\Http\Requests\Api\UpdateOrderRequest;
use Carbon;

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
        return (new RequestOk($order))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        return (new RequestOk($order))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order=Order::find($id);
        $order->update([
            'id' => $id,
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
    public function destroy($id)
    {
        //
    }
}

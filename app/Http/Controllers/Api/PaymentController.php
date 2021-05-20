<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Requests\Api\Payment\CreatePaymentRequest;
use App\Http\Requests\Api\Payment\UpdatePaymentRequest;
use App\Api\RequestOk;
use App\Api\RequestKo;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::all();
        return (new RequestOk($payments))->show();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $payment=Payment::create([
            'order_id' => $request->order_id,
            'method' => $request->method,
            'card_holder' => $request->card_holder,
            'number' => $request->number,
            'date_expiry' => $request->date_expiry,
            'cvc' => $request->cvc,
        ]);
        return (new RequestOk($payment))->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return (new RequestOk($payment))->show();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update([
            'method' => $request->method,
            'card_holder' => $request->card_holder,
            'number' => $request->number,
            'date_expiry' => $request->date_expiry,
            'cvc' => $request->cvc,
        ]);
        return (new RequestOk($payment))->update();
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

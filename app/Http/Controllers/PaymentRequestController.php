<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PaymentRequestResource;
use App\Models\PaymentRequest;

class PaymentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_request_list = PaymentRequest::paginate(10);
        return PaymentRequestResource::collection($payment_request_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment_request = new PaymentRequest();
        $payment_request->currency_id = $request->currency_id;
        $payment_request->amount = $request->amount;
        $payment_request->status = $request->status;
        $payment_request->description = $request->description;
        $payment_request->sender_id = $request->sender_id;
        $payment_request->receiver_id = $request->receiver_id;
        $payment_request->transaction_id = $request->transaction_id;
        $payment_request->branch_id = $request->branch_id;

        if($payment_request->save())
        {
            return new PaymentRequestResource($payment_request);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

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
        $user_payment_request_list = PaymentRequest::join('currency','currency.id','=','payment_requests.currency_id')
        ->join('users','users.id','=','payment_requests.sender_id')
        ->get([
            'currency.name as currency_name',
            'payment_requests.amount',
            'payment_requests.status',
            'payment_requests.description',
            'payment_requests.sender_id',
            'users.name as receiver_name',
            'payment_requests.transaction_id',
            'payment_requests.branch_id',
            'payment_requests.created_at',
            'payment_requests.updated_at',
        ])
        ->where("sender_id",$id);

        return new PaymentRequestResource($user_payment_request_list);
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

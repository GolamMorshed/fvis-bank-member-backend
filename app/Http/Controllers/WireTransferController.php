<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\WireTransferResource;
use App\Models\SendMoney;

class WireTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wire_transfer_list = SendMoney::paginate(10)->where('type','wire_transfer');
        return WireTransferResource::collection($wire_transfer_list);
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
        $wire_transfer = new SendMoney();
        $wire_transfer->user_id = $request->user_id;
        $wire_transfer->currency_id = $request->currency_id;
        $wire_transfer->amount = $request->amount;
        $wire_transfer->fee = $request->fee;
        $wire_transfer->dr_cr = $request->dr_cr;
        $wire_transfer->type = 'wire_transfer';
        $wire_transfer->method = $request->method;
        $wire_transfer->status = $request->status;
        $wire_transfer->note = $request->note;
        $wire_transfer->loan_id = $request->loan_id;
        $wire_transfer->ref_id = $request->ref_id;
        $wire_transfer->parent_id = $request->parent_id;
        $wire_transfer->other_bank_id = $request->other_bank_id;
        $wire_transfer->gateway_id = $request->gateway_id;
        $wire_transfer->created_user_id = $request->created_user_id;
        $wire_transfer->updated_user_id = $request->updated_user_id;
        $wire_transfer->branch_id = $request->branch_id;
        $wire_transfer->transaction_details = $request->transaction_details;

        if($wire_transfer->save())
        {
            return new WireTransferResource($wire_transfer);
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

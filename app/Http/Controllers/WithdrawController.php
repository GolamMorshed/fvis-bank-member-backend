<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\WithdrawResource;
use App\Models\Withdraw;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraw = Withdraw::join('users','users.id','=','withdraw.user_id')
        ->get([
            'users.name',
            'withdraw.bank_name',
            'withdraw.branch_name',
            'withdraw.swift_code',
            'withdraw.account_holder_name',
            'withdraw.account_no',
            'withdraw.account_holder_phone_no',
            'withdraw.currency',
            'withdraw.amount',
            'withdraw.approved',
            'withdraw.created_at'
        ]);

        return new WithdrawResource($withdraw);
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
        $withdraw = new Withdraw();
        $withdraw->user_id = $request->user_id;
        $withdraw->bank_name = $request->bank_name;
        $withdraw->branch_name = $request->branch_name;
        $withdraw->swift_code = $request->swift_code;
        $withdraw->account_holder_name = $request->account_holder_name;
        $withdraw->account_no = $request->account_no;
        $withdraw->account_holder_phone_no = $request->account_holder_phone_no;
        $withdraw->currency = $request->currency;
        $withdraw->amount = $request->amount;
        $withdraw->approved = "Pending";

        if($withdraw->save())
        {
            return new WithdrawResource($withdraw);
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
        $withdraw = Withdraw::join('users','users.id','=','withdraw.user_id')
        ->get([
            
            'withdraw.user_id',
            'withdraw.bank_name',
            'users.name',
            'withdraw.branch_name',
            'withdraw.swift_code',
            'withdraw.account_holder_name',
            'withdraw.account_no',
            'withdraw.account_holder_phone_no',
            'withdraw.currency',
            'withdraw.amount',
            'withdraw.approved',
            'withdraw.created_at',
            'withdraw.updated_at',

        ])->where("user_id",$id);
        return new WithdrawResource($withdraw);

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
        $update_approval = Withdraw::findOrFail($id);
        $update_approval->approved = $request->approved;

        if($update_approval->save())
        {
            return new WithdrawResource($update_approval);
        }

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

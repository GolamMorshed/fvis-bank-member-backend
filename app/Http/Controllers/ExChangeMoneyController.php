<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ExChangeMoneyResource;
use App\Models\SendMoney;

class ExChangeMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchange_money_list = SendMoney::paginate(10)->where('type','exchange_money');
        return ExChangeMoneyResource::collection($exchange_money_list);
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
        $exchange_money = new SendMoney();
        $exchange_money->user_id = $request->user_id;
        $exchange_money->currency_id = $request->currency_id;
        $exchange_money->amount = $request->amount;
        $exchange_money->fee = $request->fee;
        $exchange_money->dr_cr = $request->dr_cr;
        $exchange_money->type = 'exchange_money';
        $exchange_money->method = $request->method;
        $exchange_money->status = $request->status;
        $exchange_money->note = $request->note;
        $exchange_money->loan_id = $request->loan_id;
        $exchange_money->ref_id = $request->ref_id;
        $exchange_money->parent_id = $request->parent_id;
        $exchange_money->other_bank_id = $request->other_bank_id;
        $exchange_money->gateway_id = $request->gateway_id;
        $exchange_money->created_user_id = $request->created_user_id;
        $exchange_money->updated_user_id = $request->updated_user_id;
        $exchange_money->branch_id = $request->branch_id;
        $exchange_money->transaction_details = $request->transaction_details;

        if($exchange_money->save())
        {
            return new ExChangeMoneyResource($exchange_money);
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
        $user_exchange_money = SendMoney::join('users','users.id','=',
        'transactions.user_id')
        ->join('currency','currency.id','=','currency_id')
        ->get([
            'transactions.user_id',
            'currency.name',
            'transactions.amount',
            'transactions.fee',
            'transactions.dr_cr',
            'transactions.type',
            'transactions.method',
            'transactions.status',
            'transactions.note',
        ])
        ->where("user_id",$id)
        ->where("type","=","exchange_money");

        return new ExChangeMoneyResource($user_exchange_money);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SendMoneyResource;
use App\Models\SendMoney;

class SendMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $send_money_list = SendMoney::paginate(10)->where('type','send_money');
        return SendMoneyResource::collection($send_money_list);
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
        $send_money = new SendMoney();
        $send_money->user_id = $request->user_id;
        $send_money->currency_id = $request->currency_id;
        $send_money->amount = $request->amount;
        $send_money->fee = $request->fee;
        $send_money->dr_cr = $request->dr_cr;
        $send_money->type = 'send_money';
        $send_money->method = $request->method;
        $send_money->status = $request->status;
        $send_money->note = $request->note;
        $send_money->loan_id = $request->loan_id;
        $send_money->ref_id = $request->ref_id;
        $send_money->parent_id = $request->parent_id;
        $send_money->other_bank_id = $request->other_bank_id;
        $send_money->gateway_id = $request->gateway_id;
        $send_money->created_user_id = $request->created_user_id;
        $send_money->updated_user_id = $request->updated_user_id;
        $send_money->branch_id = $request->branch_id;
        $send_money->transaction_details = $request->transaction_details;
        $send_money->transaction_code = $request->transaction_code;

        if($send_money->save())
        {
            return new SendMoneyResource($send_money);
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
        $user_send_money = SendMoney::join('users','users.id','=',
        'transactions.user_id')
        ->join('currency','currency.id','=','currency_id')
        ->get([
            'transactions.transaction_code',
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
        ->where("type","=","send_money");

        return new SendMoneyResource($user_send_money);

    }

    public function viewAllPaymentHistory($id)
    {
        $user_payment_history= SendMoney::join('users','users.id','=',
        'transactions.user_id')
        ->join('currency','currency.id','=','currency_id')
        ->get([
            'transactions.transaction_code',
            'transactions.user_id',
            'currency.name',
            'transactions.amount',
            'transactions.fee',
            'transactions.dr_cr',
            'transactions.type',
            'transactions.method',
            'transactions.status',
            'transactions.note',
            'transactions.created_at',
        ])
        ->where("user_id",$id);

        return new SendMoneyResource($user_payment_history);
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

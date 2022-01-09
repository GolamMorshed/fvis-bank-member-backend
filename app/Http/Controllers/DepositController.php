<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DepositResource;
use App\Models\SendMoney;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposit = SendMoney::join('users as user_name','user_name.id','=',
        'transactions.created_user_id')
        ->join('currency','currency.id','=','currency_id')
        ->get([
            'transactions.id',
            'user_name.name as user_name',
            'currency.name',
            'transactions.amount',
            'transactions.fee',
            'transactions.dr_cr',
            'transactions.type',
            'transactions.method',
            'transactions.status',
            'transactions.note',
            'transactions.transaction_code',
        ])->where("type","=","deposit");

        return DepositResource::collection($deposit);
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
        $deposit = new SendMoney();
        $deposit->user_id = $request->user_id;
        $deposit->currency_id = $request->currency_id;
        $deposit->amount = $request->amount;
        $deposit->fee = $request->fee;
        $deposit->dr_cr = $request->dr_cr;
        $deposit->type = 'deposit';
        $deposit->method = $request->method;
        $deposit->status = $request->status;
        $deposit->note = $request->note;
        $deposit->loan_id = $request->loan_id;
        $deposit->ref_id = $request->ref_id;
        $deposit->parent_id = $request->parent_id;
        $deposit->other_bank_id = $request->other_bank_id;
        $deposit->gateway_id = $request->gateway_id;
        $deposit->created_user_id = $request->created_user_id;
        $deposit->updated_user_id = $request->updated_user_id;
        $deposit->branch_id = $request->branch_id;
        $deposit->transaction_details = $request->transaction_details;
        $deposit->transaction_code = $request->transaction_code;

        if($deposit->save())
        {
            return new DepositResource($deposit);
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
        $update_deposit = SendMoney::findorfail($id);
        $update_deposit->currency_id = $request->currency_id;
        $update_deposit->amount = $request->amount;
        $update_deposit->fee = $request->fee;
        $update_deposit->dr_cr = $request->dr_cr;
        $update_deposit->method = $request->method;
        $update_deposit->status = $request->status;
        $update_deposit->note = $request->note;
        $update_deposit->loan_id = $request->loan_id;
        $update_deposit->ref_id = $request->ref_id;
        $update_deposit->parent_id = $request->parent_id;
        $update_deposit->other_bank_id = $request->other_bank_id;
        $update_deposit->gateway_id = $request->gateway_id;
        $update_deposit->created_user_id = $request->created_user_id;
        $update_deposit->updated_user_id = $request->updated_user_id;
        $update_deposit->branch_id = $request->branch_id;
        $update_deposit->transaction_details = $request->transaction_details;

        if($update_deposit->save())
        {
            echo "Sucessfully Update the deposit";
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
        $delete_deposit = SendMoney::findOrFail($id);

        if($delete_deposit->delete())
        {
            echo "Sucessfully delete deposit";
        }
    }
}

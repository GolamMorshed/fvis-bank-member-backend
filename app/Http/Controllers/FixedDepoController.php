<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FixedDepositResource;
use App\Models\FixedDeposit;

class FixedDepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixed_deposit_list = FixedDeposit::paginate(10);
        return FixedDepositResource::collection($fixed_deposit_list);
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
        $fixed_depo_request = new FixedDeposit();
        $fixed_depo_request->fdr_plan_Id = $request->fdr_plan_Id;
        $fixed_depo_request->user_Id = $request->user_Id;
        $fixed_depo_request->currency_Id = $request->currency_Id;
        $fixed_depo_request->deposit_amount = $request->deposit_amount;
        $fixed_depo_request->return_amount = $request->return_amount;
        $fixed_depo_request->attachment = $request->file('attachment')->store('fixed_deposit_files');
        $fixed_depo_request->remarks = $request->remarks;
        $fixed_depo_request->status = $request->status;
        $fixed_depo_request->approved_date = $request->approved_date;
        $fixed_depo_request->mature_date = $request->mature_date;
        $fixed_depo_request->transaction_Id = $request->transaction_Id;
        $fixed_depo_request->approved_user_Id = $request->approved_user_Id;
        $fixed_depo_request->created_user_Id = $request->created_user_Id;
        $fixed_depo_request->updated_user_Id = $request->updated_user_Id;
        $fixed_depo_request->branch_Id = $request->branch_Id;
        
        if($fixed_depo_request->save())
        {
            return new FixedDepositResource($fixed_depo_request);
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

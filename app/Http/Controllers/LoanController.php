<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LoanResource;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_request_list = Loan::paginate(10);
        return LoanResource::collection($loan_request_list);
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
        $loan_request = new Loan();
        $loan_request->loan_Id = $request->loan_Id;
        $loan_request->loan_product_Id = $request->loan_product_Id;
        $loan_request->borrower_Id = $request->borrower_Id;
        $loan_request->first_payment_date = $request->first_payment_date;
        $loan_request->release_date = $request->release_date;
        $loan_request->currency_Id = $request->currency_Id;
        $loan_request->applied_amount = $request->applied_amount;
        $loan_request->total_payable = $request->total_payable;
        $loan_request->total_paid = $request->total_paid;
        $loan_request->late_payment_penalties = $request->late_payment_penalties;
        $loan_request->attachment = $request->file('attachment')->store('loan_files');
        $loan_request->description = $request->description;
        $loan_request->remarks = $request->remarks;
        $loan_request->status = $request->status;
        $loan_request->approved_date = $request->approved_date;
        $loan_request->approved_user_Id = $request->approved_user_Id;
        $loan_request->created_user_Id = $request->created_user_Id;
        $loan_request->branch_Id = $request->branch_Id;

        if($loan_request->save())
        {
            return new LoanResource($loan_request);
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

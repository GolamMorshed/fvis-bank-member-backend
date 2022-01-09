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
        $loan_request->transaction_code = $request->transaction_code;

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

        $user_loan_request_list = Loan::join('users','users.id','=',
        'loans.borrower_id')
        ->join('loan_products','loan_products.id','=','loan_product_id')
        ->join('currency','currency.id','=','currency_id')
        ->get([
            'loans.transaction_code',
            'loans.loan_id',
            'loans.borrower_id',
            'loan_products.name',
            'loans.first_payment_date',
            'loans.release_date',
            'currency.name',
            'loans.applied_amount',
            'loans.total_payable',
            'loans.total_paid',
            'loans.late_payment_penalties',
            'loans.attachment',
            'loans.description',
            'loans.remarks',
            'loans.status',
            'loans.approved_date',
            'loans.approved_user_id',
            'loans.created_user_id',
            'loans.branch_id',
            'loans.created_at',
            'loans.updated_at',
        ])
        ->where("borrower_id",$id);

        return new LoanResource($user_loan_request_list);

        // $user_loan_request_list = Loan::join('loan_products','loan_products.id','=','loans.loan_product_id')
        // ->join('users','users.id','=','loans.borrower_id')
        // ->join('currency','currency.id','=','loans.currency_id')
        // ->get([
        //     'loans.borrower_id',
        //     'loan_products.loan_name',
        //     'users.name',
        //     'loans.first_payment_date',
        //     'loans.release_date',
        //     'currency.name',
        //     'loans.applied_amount',
        //     'loans.total_payable',
        //     'loans.late_payment_penalties',
        //     'loans.attachment',
        //     'loans.description',
        //     'loans.remarks',
        //     'loans.status',
        //     'loans.approved_date',
        //     'loans.approved_user_id',
        //     'loans.created_user_id',
        //     'loans.branch_id',
        //     'loans.created_at',
        //     'loans.updated_at'
        // ])->where('borrower_id',$id);
        //
        // return new LoanResource($user_loan_request_list);
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

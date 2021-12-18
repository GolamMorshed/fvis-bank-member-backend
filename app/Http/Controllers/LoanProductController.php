<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LoanProductResource;
use App\Models\LoanProduct;

class LoanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_product = LoanProduct::paginate(10);
        return LoanProductResource::collection($loan_product);
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
        $loan_product = new LoanProduct();
        $loan_product->name = $request->name;
        $loan_product->minimum_amount = $request->minimum_amount;
        $loan_product->maximum_amount = $request->maximum_amount;
        $loan_product->description = $request->description;
        $loan_product->interest_rate = $request->interest_rate;
        $loan_product->interest_type = $request->interest_type;
        $loan_product->term = $request->term;
        $loan_product->term_period = $request->term_period;
        $loan_product->status = $request->status;

        if($loan_product->save())
        {
            return new LoanProductResource($loan_product);
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
        $loan_product_id = LoanProduct::findOrFail($id);
        $loan_product_id->status = $request->status;
        if($loan_product_id->save())
        {
            echo "Sucessfully Updated Status";
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

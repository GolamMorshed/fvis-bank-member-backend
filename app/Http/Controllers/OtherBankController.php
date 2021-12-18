<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OtherBankResource;
use App\Models\OtherBank;

class OtherBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $other_banks = OtherBank::paginate(10);
        return OtherBankResource::collection($other_banks);
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
        $other_bank = new OtherBank();
        $other_bank->name = $request->name;
        $other_bank->swift_code = $request->swift_code;
        $other_bank->bank_country = $request->bank_country;
        $other_bank->bank_currency = $request->bank_currency;
        $other_bank->minimum_transfer_amount = $request->minimum_transfer_amount;
        $other_bank->maximum_transfer_amount = $request->maximum_transfer_amount;
        $other_bank->fixed_charge = $request->fixed_charge;
        $other_bank->charge_in_percentage = $request->charge_in_percentage;
        $other_bank->descriptions = $request->descriptions;
        $other_bank->status = $request->status;

        if($other_bank->save())
        {
            return new OtherBankResource($other_bank);
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
        $other_bank_id = OtherBank::findOrFail($id);
        $other_bank_id->status = $request->status;
        if($other_bank_id->save())
        {
            echo 'Sucessfully Updated Status';
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

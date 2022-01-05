<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currency::all();
        return CurrencyResource::collection($currency);
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
        $currency = new Currency();
        $currency->name = $request->name;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->base_currency = $request->base_currency;
        $currency->status = $request->status;

        if($currency->save())
        {
            return new CurrencyResource($currency);
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

    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->name = $request->name;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->base_currency = $request->base_currency;
        $currency->status = $request->status;

        if($currency->save())
        {
            return new CurrencyResource($currency);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCurrencyStatus(Request $request, $id)
    {
        $currency_id = Currency::findOrFail($id);
        $currency_id->status = $request->status;
        if($currency_id->save())
        {
            echo 'Successfully Updated Status';
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
        $currency_id = Currency::findOrFail($id);
        if($currency_id->delete())
        {
            echo 'Successfully Delete';
        }
    }
}

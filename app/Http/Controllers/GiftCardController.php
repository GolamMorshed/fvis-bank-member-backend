<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GiftCardResource;
use App\Models\GiftCard;

class GiftCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gift_card = GiftCard::join('currency','currency.id','=','currency_id')
        ->get([
            'currency.name',
            'gift_cards.code',
            'gift_cards.amount',
            'gift_cards.status',
            'gift_cards.user_id',
            'gift_cards.branch_id'
        ]);
        return GiftCardResource::collection($gift_card);
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
        $gift_card = new GiftCard();
        $gift_card->code = $request->code;
        $gift_card->currency_id = $request->currency_id;
        $gift_card->amount = $request->amount;
        $gift_card->status = $request->status;
        $gift_card->user_id = $request->user_id;
        $gift_card->branch_id = $request->branch_id;

        if($gift_card->save())
        {
            return new GiftCardResource($gift_card);
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
        $gift_card = GiftCard::findorfail($id);
        $gift_card->currency_id = $request->currency_id;
        $gift_card->amount = $request->amount;
        $gift_card->status = $request->status;
        $gift_card->user_id = $request->user_id;
        $gift_card->branch_id = $request->branch_id;

        if($gift_card->save())
        {
            return new GiftCardResource($gift_card);
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
        $gift_card = GiftCard::findOrFail($id);

        if($gift_card->delete())
        {
            echo "Sucessfully delete gift card";
        }
    }
}

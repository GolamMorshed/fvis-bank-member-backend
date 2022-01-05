<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FAQResource;
use App\Models\FAQ;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FAQ::paginate(10);
        return FAQResource::collection($faq);
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
        $faq = new FAQ();
        $faq->locale = $request->locale;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        if($faq->save())
        {
            return new FAQResource($faq);
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
    public function edit(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->locale = $request->locale;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        if($faq->save())
        {
            return new FAQResource($faq);
        }
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
        $faq = FAQ::findOrFail($id);
        $faq->status = $request->status;
        if($faq->save())
        {
            echo 'Sucessfully Updated Activation';
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
        $faq = FAQ::findOrFail($id);
        if($faq->delete())
        {
            echo 'Sucessfully delete';
        }
    }
}

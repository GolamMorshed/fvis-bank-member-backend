<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FDRResource;
use App\Models\FDR;

class FDRPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fdr_plans = FDR::all();
        return FDRResource::collection($fdr_plans);
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
        $fdr_package = new FDR();
        $fdr_package->name = $request->name;
        $fdr_package->minimum_amount = $request->minimum_amount;
        $fdr_package->maximum_amount = $request->maximum_amount;
        $fdr_package->interest_rate = $request->interest_rate;
        $fdr_package->duration = $request->duration;
        $fdr_package->duration_type = $request->duration_type;
        $fdr_package->status = $request->status;
        $fdr_package->description = $request->description;

        if($fdr_package->save())
        {
            return new FDRResource($fdr_package);
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
        $fdr_package_id = FDR::findOrFail($id);
        $fdr_package_id->status = $request->status;
        if($fdr_package_id->save())
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

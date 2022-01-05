<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BranchResource;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::paginate(10);
        return BranchResource::collection($branchs);
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
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->contact_email = $request->contact_email;
        $branch->contact_phone = $request->contact_phone;
        $branch->address = $request->address;
        $branch->descriptions = $request->descriptions;

        if($branch->save())
        {
            return new BranchResource($branch);
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
        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        $branch->contact_email = $request->contact_email;
        $branch->contact_phone = $request->contact_phone;
        $branch->address = $request->address;
        $branch->descriptions = $request->descriptions;

        if($branch->save())
        {
            return new BranchResource($branch);
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
        $branch = Branch::findOrFail($id);
        if($branch->delete())
        {
            echo "Sucessfully Delete Branch";
        }
    }
}

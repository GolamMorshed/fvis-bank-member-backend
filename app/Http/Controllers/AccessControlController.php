<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AccessControlResource;
use App\Models\AccessControl;

class AccessControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access_control = AccessControl::join('roles','roles.id','=','role_id')
        ->get([
            'permissions.id',
            'roles.id as role_id',
            'roles.name',
            'permissions.permission'
        ]);
        return AccessControlResource::collection($access_control);
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
        $access_control = new AccessControl();
        $access_control->role_id = $request->role_id;
        $access_control->permission = $request->permission;

        if($access_control->save())
        {
            return new AccessControlResource($access_control);
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
        $access_control = AccessControl::findOrFail($id);
        $access_control->role_id = $request->role_id;
        $access_control->permission = $request->permission;

        if($access_control->save())
        {
            echo "Sucessfully update permission";
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
        $access_control = AccessControl::findOrFail($id);

        if($access_control->delete())
        {
            echo "Sucessfully delete permission";
        }
    }
}

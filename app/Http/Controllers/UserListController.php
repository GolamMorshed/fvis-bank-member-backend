<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserListResource;
use App\Models\UserList;
use Auth;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserList::paginate(10);
        return UserListResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new UserList();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->role_id = $request->role_id;
        $user->branch_id = $request->branch_id;
        $user->status = $request->status;
        $user->profile_picture = $request->file('profile_picture')->store('profile_picture');
        $user->password = bcrypt($request->password);
        $user->provider = $request->provider;
        $user->provider_id = $request->provider_id;
        $user->country_code = $request->country_code;


        if($user->save())
        {
            return new UserListResource($user);
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
        $user = UserList::findorfail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->role_id = $request->role_id;
        $user->branch_id = $request->branch_id;
        $user->status = $request->status;
        $user->password = bcrypt($request->password);
        $user->provider = $request->provider;
        $user->provider_id = $request->provider_id;
        $user->country_code = $request->country_code;

        if($user->save())
        {
            return new UserListResource($user);
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
        $user = UserList::findorfail($id);
        if($user->delete())
        {
            echo "Successfull Deleted";
        }
    }

    //EDIT USER INFORMATION
    public function editUserInformation(Request $request,$id){

        $user_info = UserList::findOrFail($id);
        $user_info->name = $request->name;
        $user_info->profile_picture = $request->file('profile_picture')->store('profile_picture');

        if($user_info->save())
        {
            echo "Successfully Updated Profile Information";
        }

    }
}

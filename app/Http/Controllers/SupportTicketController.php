<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SupportTicketResource;
use App\Models\SupportTicket;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support_ticket = SupportTicket::paginate(10);
        return SupportTicketResource::collection($support_ticket);
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

        $support_ticket = new SupportTicket();
        $support_ticket->support_ticket_id = $request->support_ticket_id;
        $support_ticket->sender_id = $request->sender_id;
        $support_ticket->subject = $request->subject;
        $support_ticket->message = $request->message;
        $support_ticket->status = $request->status;
        $support_ticket->priority = $request->priority;
        $support_ticket->operator_id = $request->operator_id;
        $support_ticket->closed_user_id = $request->closed_user_id;

        if($support_ticket->save())
        {
            echo "Sucessfully store support ticket";
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
        $status_update = SupportTicket::findorfail($id);
        $status_update->status = $request->status;

        if($status_update->save())
        {
            echo "Sucessfully update status";
        }
    }

    public function priority(Request $request, $id)
    {
        $priority_update = SupportTicket::findorfail($id);
        $priority_update->priority = $request->priority;

        if($priority_update->save())
        {
            echo "Sucessfully update priority";
        }

    }

    public function assignOperatorID(Request $request, $id)
    {
        $assign_operator_id = SupportTicket::findorfail($id);
        $assign_operator_id->operator_id = $request->operator_id;

        if($assign_operator_id->save())
        {
            echo "Sucessfully assign operator ID";
        }

    }

    public function assignClosedUserID(Request $request, $id)
    {
        $assign_closed_user_id = SupportTicket::findorfail($id);
        $assign_closed_user_id->closed_user_id = $request->closed_user_id;

        if($assign_closed_user_id->save())
        {
            echo "Sucessfully assign closed user ID";
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

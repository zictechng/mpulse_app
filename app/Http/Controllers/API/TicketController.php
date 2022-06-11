<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Output: 54esmdr0qf
       $tcode= substr(str_shuffle($permitted_chars), 0, 16);

       /* validate input first */
       $rules = [
        'subject' => 'required',
        'title' => 'required',
        'shot_note' => 'required'
    ];

    $customMessages = [
        'subject.required' => 'Please Subject Required',
        'title.required' => 'Please Title Required',
        'shot_note.required' => 'Please Enter Message'
    ];
        $this->validate($request, $rules, $customMessages);

         $ticket = new Ticket();
         $ticket->uid = $request['user_id'];
         $ticket->u_email = $request['user_email'];
         $ticket->u_name = $request['user_name'];
         $ticket->t_tiltle = $request['title'];
         $ticket->t_subject = $request['subject'];
         $ticket->t_message = $request['shot_note'];
         $ticket->t_tid = $tcode;
         $ticket->t_status = 'Open Ticket';
         $ticket->t_action = 'High';
         $ticket->save();
         return $ticket;
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
        //
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

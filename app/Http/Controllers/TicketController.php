<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Airline;
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
        if (request()->routeIs('tickets.index')) {
            $ticket = Ticket::all();
            return view('ticket.index', compact('ticket'));
        }
        if (request()->routeIs('ticket.domestic')) {
            $ticket = Ticket::where('airline_type', 'domestic')->get();
            return view('ticket.index', compact('ticket'));
        }
        if (request()->routeIs('ticket.international')) {
            $ticket = Ticket::where('airline_type', 'international')->get();
            return view('ticket.index', compact('ticket'));
        }
        if (request()->routeIs('ticket.today')) {
            $ticket = Ticket::where('date', Carbon::today())->get();
            return view('ticket.index', compact('ticket'));
        }




        // $ticket = Ticket::all();
        // return view('ticket.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        $airlines = Airline::all();
        return view('ticket.create', compact('client', 'airlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'ticket_no' => ['required'],
            'client_id' => ['required'],
            'airline_id' => ['required'],
            'airline_type' => ['required'],
            'airlinepnr' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'destination' => ['required'],
            'departure' => ['required'],
            'description' => ['required'],

        ]);

        Ticket::create($data);

        return redirect()->route('tickets.index')
            ->with('success', 'ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {

        $client = Client::all();
        $airlines = Airline::all();
        return view('ticket.edit', compact('ticket', 'client', 'airlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data =  $request->validate([
            'ticket_no' => ['required'],
            'client_id' => ['required'],
            'airline_id' => ['required'],
            'airline_type' => ['required'],
            'airlinepnr' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'destination' => ['required'],
            'departure' => ['required'],
            'description' => ['required'],
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    public function deleteTicket(Request $request)
    {
        $data = $request->validate([
            'ticket-id' => 'required'
        ]);

        $id = $data['ticket-id'];
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->back();
    }
}

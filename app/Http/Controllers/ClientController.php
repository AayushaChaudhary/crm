<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        // dd($client);
        foreach ($clients as $client) {
            $task = Task::where('client_id', $client->id)->latest()->first();
            if ($task != null) {

                $client->assigned = $task->user->name;
            } else {
                $client->assigned = "-";
            }
        }



        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-z ]{1,}$/'],
            'email' => ['required'],
            'address' => ['required'],
            'phoneno' => ['required', 'numeric', 'digits:10'],
            'dob' => ['required'],
        ]);

        $client['user_id'] = Auth::user()->id;


        client::create($client);

        return redirect()->route('client.index')
            ->with('success', 'client created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-z ]{1,}$/'],
            'email' => ['required'],
            'address' => ['required'],
            'phoneno' => ['required', 'numeric', 'digits:10'],
            'dob' => ['required'],

        ]);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phoneno' => $request->phoneno,
            'dob' => $request->dob,
        ]);
        return redirect()->route('client.index')
            ->with('success', 'client updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
    }

    public function deleteClient(Request $request)
    {
        $data = $request->validate([
            'client-id' => 'required'
        ]);

        $id = $data['client-id'];
        $client = Client::find($id);
        $client->delete();
        return redirect()->back();
    }
}

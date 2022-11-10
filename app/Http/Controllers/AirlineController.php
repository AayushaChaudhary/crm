<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airline = Airline::all();
        return view('airline.index', compact('airline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required'],
                'type' => ['required'],
            ],
            [
                'title.required' => "please enter title",
                'type.required' => "enter data",
            ]

        );

        airline::create([
            'title' => $request->title,
            'type' => $request->type,
        ]);

        return redirect()->route('airline.index')
            ->with('success', 'airline created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        return view('airline.show', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        return view('airline.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'title' => ['required'],
            'type' => ['required'],

        ]);

        $airline->update([
            'title' => $request->title,
            'type' => $request->type,
        ]);
        return redirect()->route('airline.index')
            ->with('success', 'airline updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        //
    }
    public function deleteAirline(Request $request)
    {
        $data = $request->validate([
            'airline-id' => 'required'
        ]);

        $id = $data['airline-id'];
        $airline = Airline::find($id);
        $airline->delete();
        return redirect()->back();
    }
}

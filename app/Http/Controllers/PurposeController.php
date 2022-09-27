<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purpose = Purpose::all();
        return view('purpose.index', compact('purpose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purpose.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],

        ]);

        Purpose::create([
            'name' => $request->name,
        ]);

        return redirect()->route('purpose.index')
            ->with('success', 'purpose created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function show(Purpose $purpose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function edit(Purpose $purpose)
    {
        return view('purpose.edit', compact('purpose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purpose $purpose)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $purpose->update([
            'name' => $request->name,
        ]);
        return redirect()->route('purpose.index')
            ->with('success', 'purpose updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
    }
    public function deletePurpose(Request $request)
    {
        $data = $request->validate([
            'purpose-id' => 'required'
        ]);

        $id = $data['purpose-id'];
        $purpose = Purpose::find($id);
        $purpose->delete();
        return redirect()->back();
    }
}

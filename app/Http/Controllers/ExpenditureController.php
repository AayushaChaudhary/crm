<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenditure = Expenditure::all();
        return view('expenditure.index', compact('expenditure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenditure.create');
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
            'particulars' => ['required'],
            'amount' => ['required'],
            'remarks' => ['required'],
            'date' => ['required'],

        ]);

        Expenditure::create($data);

        return redirect()->route('expenditure.index')
            ->with('success', 'expenditure created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        return view('expenditure.edit', compact('expenditure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        $data =  $request->validate([
            'particulars' => ['required'],
            'amount' => ['required'],
            'remarks' => ['required'],
            'date' => ['required'],
        ]);

        $expenditure->update($data);

        return redirect()->route('expenditure.index')
            ->with('success', 'Expenditure Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        //
    }
    public function deleteExpenditure(Request $request)
    {
        $data = $request->validate([
            'expenditure-id' => 'required'
        ]);

        $id = $data['expenditure-id'];
        $expenditure = Expenditure::find($id);
        $expenditure->delete();
        return redirect()->back();
    }
}

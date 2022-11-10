<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::all();
        $total = Income::sum('amount');
        $dincomes = Income::whereDate('date', Carbon::today())->sum('amount');
        $mincomes = Income::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now())->sum('amount');
        return view('income.index', compact('income', 'total', 'dincomes', 'mincomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income.create');
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
            'remarks' => ['nullable'],
            'date' => ['required'],

        ]);

        Income::create($data);

        return redirect()->route('income.index')
            ->with('success', 'income created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('income.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('income.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $data =  $request->validate([
            'particulars' => ['required'],
            'amount' => ['required'],
            'remarks' => ['nullable'],
            'date' => ['required'],
        ]);

        $income->update($data);

        return redirect()->route('income.index')
            ->with('success', 'Income Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
    public function deleteIncome(Request $request)
    {
        $data = $request->validate([
            'income-id' => 'required'
        ]);

        $id = $data['income-id'];
        $income = Income::find($id);
        $income->delete();
        return redirect()->back();
    }
}

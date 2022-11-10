<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendence = Attendence::where('user_id', auth()->user()->id)->get();
        return view("attendence.index", compact("attendence"));
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

        $attendence = new Attendence;
        $attendence->user_id = Auth::user()->id;
        $attendence->clock_in = Carbon::now()->format('H:i:s');
        // $attendence->clock_out = Carbon::now()->format('H:i:S');
        $attendence->date = Carbon::now()->format('y-m-d');


        if (Attendence::where('user_id', auth()->user()->id)->where('date', carbon::today()->format('y-m-d'))->exists()) {
            return redirect()->back();
        } elseif (Auth::user()->entry_time < Carbon::now()->format('H:i:s')) {
            if ($request->reason == null) {
                return redirect()->back()->with('message', "your field is empty");
            }
            $attendence->late_entry = $request->reason;
        }




        $attendence->save();

        return redirect()->back()
            ->with('success', 'clocked In sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {

        $attendence->user_id = Auth::user()->id;
        $attendence->clock_out = Carbon::now()->format('H:i:s');
        // total work
        $a = Carbon::parse(Attendence::where('date', Carbon::today()->format('y-m-d'))->where(
            'user_id',
            Auth::id()
        )->pluck('clock_in')->first());

        $b = Carbon::parse(Carbon::now()->format('H:i:s'));
        $attendence->total_hour = Carbon::parse($a->diffInSeconds($b))->format('H:i:s');

        // clock out
        if (Auth::user()->exit_time > Carbon::now()->format('H:i:s')) {
            if ($request->reason1 == null) {
                return redirect()->back()->with('message', "your field is empty");
            }
            $attendence->early_exit = $request->reason1;
        }



        $attendence->save();

        return redirect()->back()
            ->with('success', 'clocked out sucessfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
    public function month()
    {
        $monthattendences = Attendence::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->get();
        return view("attendence.month", compact("monthattendences"));
    }
}

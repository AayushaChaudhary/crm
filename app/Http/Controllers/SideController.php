<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendence;
use Illuminate\Http\Request;

class SideController extends Controller
{
    public function index()
    {
        $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();
        $attendance = Attendence::where('user_id', auth()->user()->id)->count();
        return view('dashboard', compact('attendence', 'attendance'));
    }
}

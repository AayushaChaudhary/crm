<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
        $now = now();
        $upcomings = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->get();

        foreach ($upcomings as $user) {
            $today = Carbon::today();
            $dob = $user->dob;
            $remainings = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainings;
        }
        return view('birthday.index', compact('upcomings'));
    }
}

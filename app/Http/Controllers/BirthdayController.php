<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
        $now = now();
        $upcomings = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->get();

        foreach ($upcomings as $user) {
            $today = Carbon::today();
            $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
            $remainings = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainings;
        }
        return view('birthday.index', compact('upcomings'));
    }

    public function cindex()
    {
        $now = now();
        $upcommings = Client::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->get();

        foreach ($upcommings as $client) {
            $today = Carbon::today();
            $dob = Carbon::parse($client->dob)->year(now()->format('y'))->format('y-m-d');
            $remainings = $today->diffInDays(Carbon::parse($dob));
            $client->remaining = $remainings;
        }
        return view('birthday.cindex', compact('upcommings'));
    }
}

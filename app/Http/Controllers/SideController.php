<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Leave;
use App\Models\Client;
use App\Models\Income;
use App\Models\Ticket;
use App\Models\Airline;
use App\Models\Attendence;
use Psy\Readline\Userland;
use App\Models\Expenditure;
use Illuminate\Http\Request;

class SideController extends Controller
{
    public function index()
    {
        $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();
        $attendance = Attendence::where('user_id', auth()->user()->id)->count();
        $airline = Airline::all()->count();
        $income = Income::whereDate('date', Carbon::today())->sum('amount');
        $leave = Leave::all()->count();
        $now = now();
        $upcomings = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->count();
        $this_month_attendence = Attendence::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->count();
        $today_ticket = Ticket::where('date', Carbon::today())->count();
        $upcommings = Client::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->count();
        $upcoming_ticket = Ticket::whereMonth('date', $now->month)->whereDay('date', '>=', $now->day)->orderBy('date', 'ASC')->count();

        $upcoming = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->get();

        foreach ($upcoming as $user) {
            $today = Carbon::today();
            $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
            $remainings = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainings;
        }


        $upcoming_client = Client::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->get();

        foreach ($upcoming_client as $client) {
            $today = Carbon::today();
            $dob = Carbon::parse($client->dob)->year(now()->format('y'))->format('y-m-d');
            $remainings = $today->diffInDays(Carbon::parse($dob));
            $client->remaining = $remainings;
        }

        // Income and expenditure Diagram

        $before7days = \Carbon\Carbon::today()->subDays(7); // today - 7 days

        $last7daysnames = [];
        for ($i = 7; $i > 0; $i--) {
            $last7daysnames[] = (\Carbon\Carbon::today()->subDays($i)->format('l'));
        }


        $last7daysincome = Income::selectRaw('sum(amount) as total_income, DAYNAME(created_at) as day')->where('created_at', '>=', $before7days)->groupBy('day')->orderBy('created_at')->get();
        $last7daysexp = Expenditure::selectRaw('sum(amount) as total_expenditure, DAYNAME(created_at) as day')->where('created_at', '>=', $before7days)->groupBy('day')->orderBy('created_at')->get();
        // [sunday, monday, tuesday] days
        // [
        //     {
        //         total_income => 2000,
        //         day => sunday
        //     }
        //     {
        //         total_income => 2000,
        //         day => monday
        //     } 
        //     {
        //         total_income => 2000,
        //         day => wednesday
        //     }
        // ]
        // get toatal income of every day in array
        $last7daysincomeAmount = collect($last7daysnames)->map(function ($name) use ($last7daysincome) {
            // $name = sunday
            foreach ($last7daysincome as $income) {
                if ($income->day == $name) {
                    return $income->total_income;
                }
            }
            return 0;
        });
        // $last7daysincomeAmount = [2000]


        $last7daysexpAmount = collect($last7daysnames)->map(function ($name) use ($last7daysexp) {
            foreach ($last7daysexp as $exp) {
                if ($exp->day == $name) {
                    return $exp->total_expenditure;
                }
            }
            return 0;
        });

        $finalIncomeExpenditureReport = [
            'days' => $last7daysnames,
            'incomes' => $last7daysincomeAmount,
            'expenditures' => $last7daysexpAmount
        ];



        // piechart of task
        $pentask = Task::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->where('status', '=', 'pending')->count();
        $proctask = Task::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->where('status', '=', 'processing')->count();
        $comtask = Task::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->where('status', '=', 'complete')->count();
        $final = [
            'pen' => $pentask,
            'proc' => $proctask,
            'com' => $comtask,
        ];

        // Bardiagram of attendences
        $month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $attendence_barchart = array();
        foreach ($month as $mon) {
            array_push($attendence_barchart, Attendence::where('user_id', auth()->user()->id)->WhereYear('date', Carbon::now()->year)->WhereMonth('date', $mon)->count());
        }

        $finalattendence = json_encode(collect($attendence_barchart)->values());






        return view('dashboard', compact('attendence', 'attendance', 'airline', 'income', 'leave', 'upcomings', 'this_month_attendence', 'today_ticket', 'upcommings', 'upcoming_ticket', 'upcoming', 'upcoming_client', 'finalIncomeExpenditureReport', 'final', 'finalattendence'));
    }
}

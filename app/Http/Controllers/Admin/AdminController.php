<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.attendence.index', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $attendence = Attendence::where('user_id', $user->id)->get();
        // dd($attendences);
        return view('admin.attendence.show', compact("attendence"));
    }
}

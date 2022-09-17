<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {


        $leaves = Leave::all();
        return view('admin.leaves.index', compact('leaves'));
    }



    public function approved(Request $request)
    {
        $data = $request->validate([
            "remarks" => ["required"],
            "leave_id" => ["required"],

        ]);

        $leave = Leave::findOrFail($data['leave_id']);
        $leave->remarks = $data['remarks'];
        $leave->status = 'approved';
        // dd($leave);
        $leave->save();
        return redirect()->route("admin.leaves");
    }
}

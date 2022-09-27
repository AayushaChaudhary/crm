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

    public function declined(Request $request)
    {
        $data = $request->validate([
            'remarks' => ['required'],
            'leave_id' => ['required'],
        ]);

        $leave = Leave::findOrFail($data['leave_id']);
        $leave->remarks = $data['remarks'];
        $leave->status = 'declined';

        $leave->save();
        return redirect()->route('admin.leaves');
    }

    public function show($id)
    {
        $leaves = Leave::find($id);
        return view('admin.leaves.show', compact('leaves'));
    }
}

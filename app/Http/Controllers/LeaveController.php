<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = Leave::all();
        return view('leave.index', compact('leave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create');
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
            'subject' => ['required'],
            'image' => ['mimes:png,jpg,gif'],
            'description' => ['required'],
        ]);

        $data["date"] = Carbon::now()->format('y-m-d');
        $data["user_id"] = auth()->user()->id;

        if ($request->file('image')) {
            $ext = $request->file('image')->extension();
            $name = Str::random(20);
            $path = $name . "." . $ext;
            $request->file('image')->storeAs('public/images', $path);
            $data['image'] = "images/" . $path;
        }
        // $leave->status = $request->Rule::in(leave::STATUS);
        Leave::create($data);


        return redirect()->route('leave.index')
            ->with('success', 'leave added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        return view('leave.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        return view('leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {

        $data = $request->validate([
            'subject' => ['required'],
            'image' => ['image', 'mimes:png,jpg,gif,jpeg'],
            'description' => ['required'],
        ]);

        if ($request->file('image')) {
            $ext = $request->file('image')->extension();
            $name = Str::random(20);
            $path = $name . "." . $ext;
            $request->file('image')->storeAs('public/images', $path);
            $data['image'] = "images/" . $path;
            if ($leave->image) {

                Storage::delete($leave->image);
            }
        }


        $leave->update($data);
        return redirect()->route('leave.index')
            ->with('success', 'leave updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
    public function deleteLeave(Request $request)
    {
        $data = $request->validate([
            'leave-id' => 'required'
        ]);

        $id = $data['leave-id'];
        $leave = Leave::find($id);
        $leave->delete();
        return redirect()->back();
    }
}

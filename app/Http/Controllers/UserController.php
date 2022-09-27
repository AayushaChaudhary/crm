<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'dob' => ['required'],
            'address' => ['required'],
            'phoneno' => ['required'],
            'role' => ['required', Rule::in(User::CRUD_ROLES)],
            'post' => ['required'],
            'bloodgroup' => ['required'],
            'entry_time' => ['required'],
            'exit_time' => ['required',]

        ]);

        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'address' => $request->address,
            'phoneno' => $request->phoneno,
            'role' => $request->role,
            'post' => $request->post,
            'bloodgroup' => $request->bloodgroup,
            'entry_time' => $request->entry_time,
            'exit_time' => $request->exit_time,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'dob' => ['required'],
            'address' => ['required'],
            'phoneno' => ['required'],
            'role' => ['required', Rule::in(User::CRUD_ROLES)],
            'post' => ['required'],
            'bloodgroup' => ['required'],
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'address' => $request->address,
            'phoneno' => $request->phoneno,
            'role' => $request->role,
            'post' => $request->post,
            'bloodgroup' => $request->bloodgroup,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'user updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    }
    public function deleteUser(Request $request)
    {
        $data = $request->validate([
            'user-id' => 'required'
        ]);

        $id = $data['user-id'];
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $user = User::find($id);
        $task = Task::where('user_id', $user->id)->get();
        return view('user.view', compact("task"));
    }
}

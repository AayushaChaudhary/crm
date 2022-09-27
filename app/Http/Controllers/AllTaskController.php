<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Purpose;
use App\Models\Department;
use Illuminate\Http\Request;

class AllTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::all();
        return view('taskk.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purposes = Purpose::all();
        $departments = Department::all();
        $users = User::all();
        $clients = Client::all();

        return view('taskk.create', compact('purposes', 'departments', 'users', 'clients'));
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
            'user_id' => ['required'],
            'purpose_id' => ['required'],
            'department_id' => ['required'],
            'client_id' => ['required'],
            'remarks' => ['required'],
        ]);

        Task::create($data);

        return redirect()->route('task.index')->with('success', 'Task added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('taskk.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $purposes = Purpose::all();
        $departments = Department::all();
        $users = User::all();
        $clients = Client::all();

        return view('taskk.edit', compact('task', 'purposes', 'departments', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data =  $request->validate([
            'user_id' => ['required'],
            'purpose_id' => ['required'],
            'department_id' => ['required'],
            'client_id' => ['required'],
            'remarks' => ['required'],
        ]);

        $task->update($data);

        return redirect()->route('task.index')
            ->with('success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
    public function deleteTask(Request $request)
    {
        $data = $request->validate([
            'task-id' => 'required'
        ]);

        $id = $data['task-id'];
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function mytask()
    {

        $task = Task::where('user_id', auth()->user()->id)->get();
        return view('Task.index', compact('task'));
    }

    public function Pending($id)
    {
        $task = Task::find($id);
        $task->status = 'pending';
        $task->save();
        return redirect()->back();
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->status = 'complete';
        $task->save();
        return redirect()->back();
    }

    public function processing($id)
    {
        $task = Task::find($id);
        $task->status = 'processing';
        $task->save();
        return redirect()->back();
    }

    public function assign($id)
    {
        $purposes = purpose::all();
        $departments = Department::all();
        $users = User::all();

        $client = Client::findOrfail($id);
        return view('taskk.create', compact('purposes', 'departments', 'users', 'client'));
    }
}

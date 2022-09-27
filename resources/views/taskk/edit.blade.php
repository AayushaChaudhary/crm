@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update Tasks
        <a href="{{ route('task.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('task.update',$task) }}">
    @csrf
    @method('put')
    <div>
        <label for="user_id">User</label>

        <select name="user_id" id="user_id" class="block mt-1 w-full">

            @foreach ($users as $user)
                <option value="{{ $user->id }}" @if ($task->user_id == $user->id)
                    selected 
                @endif>{{ $user->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="client_id">Client</label>

        <select name="client_id" id="client_id" class="block mt-1 w-full">

            @foreach ($clients as $client)
                <option value="{{ $client->id }}" @if ($task->client_id == $client->id)
                    selected 
                @endif>{{ $client->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="department_id">Department</label>

        <select name="department_id" id="department_id" class="block mt-1 w-full">

            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @if ($task->department_id == $department->id)
                    selected 
                @endif>{{ $department->title }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="purpose_id">Purpose</label>

        <select name="purpose_id" id="purpose_id" class="block mt-1 w-full">

            @foreach ($purposes as $purpose)
                <option value="{{ $purpose->id }}" @if ($task->purpose_id == $purpose->id)
                    selected 
                @endif>{{ $purpose->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <x-label for="remarks" :value="__('Remarks')" />

        <x-input id="remarks" class="block mt-1 w-full" type="text" name="remarks" value="{{$task->remarks}}" required autofocus />
    </div>

   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection
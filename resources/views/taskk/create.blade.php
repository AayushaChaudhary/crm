@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Tasks
        <a href="{{ route('task.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('task.store') }}">
    @csrf

    @if ($errors->any())
    {{ $errors }}
    @endif

    <div>
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($users as $user)
         <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="client_id">Client</label>
        <select type="text" name="client_id" id="client_id" class="block mt-1 w-full" required autofocus>
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        </select>
         
        
    </div>

    <div class="mt-4">
        <label for="department_id">Department</label>
        <select name="department_id" id="department_id" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($departments as $department)
         <option value="{{ $department->id }}">{{ $department->title }}</option>
          @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="purpose_id">Purpose</label>
        <select name="purpose_id" id="purpose_id" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($purposes as $purpose)
         <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="remarks">Remarks</label>
        <input type="text" id="remarks" name="remarks" class="block mt-1 w-full" required autofocus>
    </div>


<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
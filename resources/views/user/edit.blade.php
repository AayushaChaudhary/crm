@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Users
        <a href="{{ route('user.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('user.update',$user) }}">
    @csrf
    @method('put')
  

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />
        <input type="text" name="name" id="name" value= "{{ $user->name }}" class="w-full rounded-md">
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <input type="text" name="email" id="email" value= "{{ $user->email }}" class="w-full rounded-md">
    </div>

    <!-- Password 
    <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
    </div> -->
    <div>
        <x-label for="dob" :value="__('dob')" />
        <input type="text" name="dob" id="dob" value= "{{ $user->dob }}" class="w-full rounded-md">
    </div>


    <div>
        <x-label for="address" :value="__('address')" />
        <input type="text" name="address" id="address" value= "{{ $user->address }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="entry_time" :value="__('entry_time')" />
        <input type="text" name="entry_time" id="entry_time" value= "{{ $user->entry_time }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="exit_time" :value="__('exit_time')" />
        <input type="text" name="exit_time" id="exit_time" value= "{{ $user->exit_time }}" class="w-full rounded-md">
    </div>



    <div>
        <x-label for="phoneno" :value="__('phoneno')" />
        <input type="text" name="phoneno" id="phoneno" value= "{{ $user->phoneno }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="role" :value="__('role')" />
        <select name="role" id="role" class="block mt-1 w-full" >
            {{-- <option value="admin"  @if($user->role=='admin') selected @endif>Admin</option> --}}
            {{-- <option value="user"  @if($user->role=='user') selected @endif>User</option> --}}
            @foreach (\App\Models\User::CRUD_ROLES as $role )
                <option value="{{ $role }}" @if($user->role==$role) selected @endif>
                    {{ $role }}
                </option>
            @endforeach
            
        </select>
    </div>

    <div>
        <x-label for="post" :value="__('Post')" />
        <input type="text" name="post" id="post" value= "{{ $user->post }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="bloodgroup" :value="__('bloodgroup')" />
        <input type="text" name="bloodgroup" id="bloodgroup" value= "{{ $user->bloodgroup }}" class="w-full rounded-md">
    </div>


<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection

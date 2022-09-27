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

<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
    </div>

    <div>
        <x-label for="dob" :value="__('dob')" />

        <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
    </div>



    <div>
        <x-label for="address" :value="__('address')" />

        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
    </div>

    <div>
        <x-label for="entry_time" :value="__('entry_time')" />

        <x-input id="entry_time" class="block mt-1 w-full" type="text" name="entry_time" :value="old('entry_time')" required autofocus />
    </div>

    <div>
        <x-label for="exit_time" :value="__('exit_time')" />

        <x-input id="exit_time" class="block mt-1 w-full" type="text" name="exit_time" :value="old('exit_time')" required autofocus />
    </div>

    <div>
        <x-label for="phoneno" :value="__('phoneno')" />

        <x-input id="phoneno" class="block mt-1 w-full" type="text" name="phoneno" :value="old('phoneno')" required autofocus />
    </div>

    <div>
        <x-label for="role" :value="__('Role')" />
        <select name="role" id="role" class="block mt-1 w-full">
            @foreach (\App\Models\User::CRUD_ROLES as $role )
                <option value="{{ $role }}" @if(old('role')==$role) selected @endif>
                    {{ $role }}
                </option>
            @endforeach
            
        </select>
    </div>

    <div>
        <x-label for="post" :value="__('Post')" />
        <x-input id="post" class="block mt-1 w-full" type="text" id="post" name="post" required autofocus />
    </div>

    <div>
        <x-label for="bloodgroup" :value="__('bloodgroup')" />

        <x-input id="bloodgroup" class="block mt-1 w-full" type="text" name="bloodgroup" :value="old('bloodgroup')" required autofocus />
    </div>

    


<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New clients
        <a href="{{ route('client.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('client.update',$client) }}">
    @csrf
    @method('put')
   

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />
        <input type="text" name="name" id="name" value= "{{ $client->name }}" class="w-full rounded-md">
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <input type="text" name="email" id="email" value= "{{ $client->email }}" class="w-full rounded-md">
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
        <x-label for="address" :value="__('address')" />
        <input type="text" name="address" id="address" value= "{{ $client->address }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="phoneno" :value="__('phoneno')" />
        <input type="text" name="phoneno" id="phoneno" value= "{{ $client->phoneno }}" class="w-full rounded-md">
    </div>
    <div>
        <x-label for="dob" :value="__('dob')" />
        <input type="text" name="dob" id="dob" value= "{{ $client->dob }}" class="w-full rounded-md">
    </div>

   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection

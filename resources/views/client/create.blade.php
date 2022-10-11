@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Clients
        <a href="{{ route('client.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('client.store') }}">
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


    <div>
        <x-label for="address" :value="__('address')" />

        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
    </div>

    <div>
        <x-label for="phoneno" :value="__('phoneno')" />

        <x-input id="phoneno" class="block mt-1 w-full" type="text" name="phoneno" :value="old('phoneno')" required autofocus />
    </div>

    <div>
        <x-label for="dob" :value="__('dob')" />

        <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
    </div>



<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
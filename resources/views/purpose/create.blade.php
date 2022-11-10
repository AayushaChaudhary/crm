@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Purposes
        <a href="{{ route('purpose.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('purpose.store') }}">
    @csrf

    @if ($errors->any())
    {{ $errors }}
    @endif

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>


<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
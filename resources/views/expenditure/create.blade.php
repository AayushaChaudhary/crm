@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Expenditure
        <a href="{{ route('expenditure.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('expenditure.store') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-label for="particulars" :value="__('Particulars')" />

        <x-input id="particulars" class="block mt-1 w-full" type="text" name="particulars" :value="old('particulars')" required autofocus />
    </div>
    <div>
        <x-label for="amount" :value="__('amount')" />

        <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
    </div>
    <div>
        <x-label for="remarks" :value="__('remarks')" />

        <x-input id="remarks" class="block mt-1 w-full" type="text" name="remarks" :value="old('remarks')" required autofocus />
    </div>
    <div>
        <x-label for="date" :value="__('date')" />

        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
    </div>


<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
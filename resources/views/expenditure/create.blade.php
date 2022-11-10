@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New Expenditures
        <a href="{{ route('expenditure.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('expenditure.store') }}">
    @csrf

    @if ($errors->any())
    {{ $errors }}
    @endif

    <!-- Name -->
    <div>
        <x-label for="particulars" :value="__('Particulars')" />

        <x-input id="particulars" class="block mt-1 w-full" type="text" name="particulars" :value="old('particulars')" required autofocus />
    </div>
    <div>
        <x-label for="amount" :value="__('amount')" />

        <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required autofocus />
    </div>
    <div>
        <x-label for="remarks" :value="__('remarks')" />

        <x-input id="remarks" class="block mt-1 w-full" type="text" name="remarks" :value="old('remarks')"  />
    </div>
    <div>
        <x-label for="date" :value="__('date')" />

        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
    </div>


<div class="pt-3 ">
    <button class="bg-blue-600 text-white py-2 px-6 font-bold rounded-full float-left ">Save</button>
</div>
    
    </div>
</form>
@endsection
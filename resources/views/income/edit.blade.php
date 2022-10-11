@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update Income
        <a href="{{ route('income.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('income.update',$income) }}">
    @csrf
    @method('put')
   

    <!-- Name -->
    <div>
        <x-label for="particulars" :value="__('particulars')" />
        <input type="text" name="particulars" id="particulars" value= "{{ $income->particulars }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="amount" :value="__('amount')" />
        <input type="text" name="amount" id="amount" value= "{{ $income->amount }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="remarks" :value="__('remarks')" />
        <input type="text" name="remarks" id="remarks" value= "{{ $income->remarks }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="date" :value="__('date')" />
        <input type="date" name="date" id="date" value= "{{ $income->date }}" class="w-full rounded-md">
    </div>


   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection

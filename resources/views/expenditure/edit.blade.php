@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update Expenditures
        <a href="{{ route('expenditure.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('expenditure.update',$expenditure) }}">
    @csrf
    @method('put')

    @if ($errors->any())
    {{ $errors }}
    @endif
   

    <!-- Name -->
    <div>
        <x-label for="particulars" :value="__('particulars')" />
        <input type="text" name="particulars" id="particulars" value= "{{ $expenditure->particulars }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="amount" :value="__('amount')" />
        <input type="text" name="amount" id="amount" value= "{{ $expenditure->amount }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="remarks" :value="__('remarks')" />
        <input type="text" name="remarks" id="remarks" value= "{{ $expenditure->remarks }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="date" :value="__('date')" />
        <input type="date" name="date" id="date" value= "{{ $expenditure->date }}" class="w-full rounded-md">
    </div>


   

<div class="pt-3">
    <button class="bg-blue-600 text-white py-2 px-6 font-bold rounded-full float-left ">Save</button>
</div>
    
    </div>
</form>
@endsection

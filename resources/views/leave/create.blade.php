@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Add New leaves
        <a href="{{ route('leave.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('leave.store') }}" enctype="multipart/form-data">
    @csrf

     @if($errors->any())
        {{ $errors }}
    @endif 
    <!-- Title -->
    <div>
        <x-label for="subject" :value="__('subject')" />

        <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required autofocus />
    </div>

    <div>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 pt-3" for="image">Add Attachment</label>
        <input class="block w-full h-10 text-sm text-blue-900 bg-gray-50 rounded-lg border  " id="image" name="image" type="file">
        
    </div>



<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
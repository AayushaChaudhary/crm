@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="flex md:flex-row gap-10 justify-end mt-5 flex-col px-5">
        <div class="block rounded-lg bg-blue-500 shadow-lg p-2  hover:bg-indigo-500 hover:text-white">
            <i class="fa-solid fa-clock pr-2"></i>
            <span class="font-bold text-black hover:text-white pl-2">Clock In 1</span>
        </div>

        <div class="block rounded-lg bg-blue-500 shadow-lg p-2 hover:bg-indigo-500 hover:text-white">
            <i class="fa-solid fa-clock pr-2"></i>
            <span class="font-bold text-black pl-2 hover:text-white">Clock Out</span>
        </div>

    </div>
</div>

@endsection


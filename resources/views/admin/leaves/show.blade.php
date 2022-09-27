@extends('layouts.sidebar')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="w-full">
    <div class="text-black text-2xl font-bold py-8 px-5 w-full">Leaves Details
        <a href="{{ route('admin.leaves') }}">
            <button class="bg-gray-700 text-white text-xl rounded-full hover:bg-gray-600 font-bold py-2 px-4 text-center absolute right-20">
                <i class="fa-solid fa-arrow-left pr-2"></i>Back</button></a>
    </div>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg p-10 w-full">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-separate">
        <thead class="text-xm uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ID
                </th>
                <td>
                    {{ $leaves->id }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    User Name
                </th>
                <td>
                    {{ $leaves->user->name }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Subject
                </th>
                <td>
                    {{ $leaves->subject }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <td>
                    {{ $leaves->date }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <td>
                    <img src="/storage/{{ $leaves->image}}" class="h-4">
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <td>
                    {{ $leaves->status }}
                </td>
            </tr>
           
        </thead>
    </table>

@endsection
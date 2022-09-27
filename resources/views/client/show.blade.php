@extends('layouts.sidebar')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="w-full">
    <div class="text-black text-2xl font-bold py-8 px-5 w-full">Task Details
        <a href="{{ route('client.index') }}">
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
                    {{ $client->id }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <td>
                    {{ $client->name }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Address
                </th>
                <td>
                    {{ $client->address }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <td>
                    {{ $client->email }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Phoneno
                </th>
                <td>
                    {{ $client->phoneno }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Added By
                </th>
                <td>
                    {{ $client->user->name }}
                </td>
            </tr>
           
        </thead>
    </table>

@endsection
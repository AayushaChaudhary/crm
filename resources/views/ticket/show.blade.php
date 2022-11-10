@extends('layouts.sidebar')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="w-full">
    <div class="text-black text-2xl font-bold py-8 px-5 w-full">Tickets Details
        <a href="{{ route('tickets.index') }}">
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
                    {{ $ticket->id }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Ticket No
                </th>
                <td>
                    {{ $ticket->ticket_no }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Client
                </th>
                <td>
                    {{ $ticket->client->name }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Airline Title
                </th>
                <td>
                    {{ $ticket->airline->title }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Airline Type
                </th>
                <td>
                    {{ $ticket->airline_type }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <td>
                    {{ $ticket->date }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Time
                </th>
                <td>
                    {{ $ticket->time }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Airlinepnr
                </th>
                <td>
                    {{ $ticket->airlinepnr }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Destination
                </th>
                <td>
                    {{ $ticket->destination }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Departure
                </th>
                <td>
                    {{ $ticket->departure }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <td>
                    {{ $ticket->description }}
                </td>
            </tr>
           
        </thead>
    </table>

@endsection
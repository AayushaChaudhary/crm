@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update Ticket
        <a href="{{ route('tickets.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('tickets.update',$ticket) }}">
    @csrf
    @method('put')

    @if ($errors->any())
    {{ $errors }}
    @endif

    <div class="mt-4">
        <x-label for="ticket_no" :value="__('ticket_no')" />

        <x-input id="ticket_no" class="block mt-1 w-full" type="text" name="ticket_no" value="{{$ticket->ticket_no}}" required autofocus />
    </div>
    <div>
        <label for="client_id">Client</label>

        <select name="client_id" id="client_id" class="block mt-1 w-full">

            @foreach ($client as $client)
                <option value="{{ $client->id }}" @if ($ticket->client_id == $client->id)
                    selected 
                @endif>{{ $client->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="airline_id">Airline Title</label>

        <select name="airline_id" id="airline_id" class="block mt-1 w-full">

            @foreach ($airlines as $airline)
                <option value="{{ $airline->id }}" @if ($ticket->airline_id == $airline->id)
                    selected 
                @endif>{{ $airline->title }}</option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="airline_type">Airline Type</label>

        <select name="airline_type" id="airline_type" class="block mt-1 w-full">

            @foreach ($airlines as $airline)
                <option value="{{ $airline->id }}" @if ($ticket->airline_type == $airline->type)
                    selected 
                @endif>{{ $airline->type }}</option>
            @endforeach

        </select>
    </div>
    <div class="mt-4">
        <x-label for="date" :value="__('date')" />

        <x-input id="date" class="block mt-1 w-full" type="text" name="date" value="{{$ticket->date}}" required autofocus />
    </div>

   

    <div class="mt-4">
        <x-label for="time" :value="__('time')" />

        <x-input id="time" class="block mt-1 w-full" type="text" name="time" value="{{$ticket->time }}" required autofocus />
    </div>

    <div class="mt-4">
        <x-label for="airlinepnr" :value="__('airlinepnr')" />

        <x-input id="airlinepnr" class="block mt-1 w-full" type="text" name="airlinepnr" value="{{$ticket->airlinepnr }}" required autofocus />
    </div>

    <div class="mt-4">
        <x-label for="destination" :value="__('destination')" />

        <x-input id="destination" class="block mt-1 w-full" type="text" name="destination" value="{{$ticket->destination }}" required autofocus />
    </div>

    <div class="mt-4">
        <x-label for="departure" :value="__('departure')" />

        <x-input id="departure" class="block mt-1 w-full" type="text" name="departure" value="{{$ticket->departure }}" required autofocus />
    </div>
    <div class="mt-4">
        <x-label for="description" :value="__('description')" />

        <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$ticket->description }}" required autofocus />
    </div>

   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection
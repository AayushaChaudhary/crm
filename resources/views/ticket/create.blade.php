@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Ticket Create
        <a href="{{ route('tickets.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('tickets.store') }}">
    @csrf

    @if ($errors->any())
    {{ $errors }}
    @endif

    <div class="mt-4">
        <label for="ticket_no">Ticket No</label>
        <input type="text" name="ticket_no" id="ticket_no" class="block mt-1 w-full" required autofocus>
        
    </div>
    <div>
        <label for="client_id">Client</label>
        <select name="client_id" id="client_id" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($client as $client)
         <option value="{{ $client->id }}">{{ $client->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="airline_id">Airline Title</label>
        <select name="airline_id" id="airline_id" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($airlines as $airline)
         <option value="{{ $airline->id }}">{{ $airline->title }}</option>
       
          @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="airline_type">Airline Type</label>
        <select name="airline_type" id="airline_type" class="block mt-1 w-full" required autofocus>
         <option value="">Choose one...</option>
          @foreach ($airlines as $airline)
         <option value="{{ $airline->type }}">{{ $airline->type }}</option>
       
          @endforeach
        </select>
    </div>

   


    <div class="mt-4">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="block mt-1 w-full" required autofocus>
        
    </div>

    <div class="mt-4">
        <label for="time">Time</label>
        <input type="time" name="time" id="time" class="block mt-1 w-full" required autofocus>
        
    </div>
    <div class="mt-4">
        <label for="airlinepnr">Airlineepnr</label>
        <input type="text" name="airlinepnr" id="airlinepnr" class="block mt-1 w-full" required autofocus>
        
    </div>
    <div class="mt-4">
        <label for="destination">Destination</label>
        <input type="text" id="destination" name="destination" class="block mt-1 w-full" required autofocus>
    </div>
    <div class="mt-4">
        <label for="departure">Departure</label>
        <input type="text" name="departure" id="departure" class="block mt-1 w-full" required autofocus>
        
    </div>
    <div class="mt-4">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="block mt-1 w-full" required autofocus>
        
    </div>


<div class="pt-3 ">
    <button class="bg-blue-500 py-2 px-4 rounded-md ">Save</button>
</div>
    
    </div>
</form>
@endsection
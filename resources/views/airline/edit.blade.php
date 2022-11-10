@extends('layouts.sidebar')
@section('main')
<div class="w-full">
    <div class="text-black font-bold py-3 px-5">Update Airlines
        <a href="{{ route('airline.index') }}">
        <button class="bg-blue-600 text-white py-2 px-4 font-bold rounded-full float-right">
            Go Back
        </button>
        </a>
    </div>
</div>

<form method="POST" action="{{ route('airline.update',$airline) }}">
    @csrf
    @method('put')

    @if ($errors->any())
    {{ $errors }}
    @endif
   

    <!-- Name -->
    <div>
        <x-label for="title" :value="__('Title')" />
        <input type="text" name="title" id="title" value= "{{ $airline->title }}" class="w-full rounded-md">
    </div>

    <div>
        <x-label for="type" :value="__('type')" />
        <select name="type" id="type" class="block mt-1 w-full" >
            {{-- <option value="admin"  @if($user->role=='admin') selected @endif>Admin</option> --}}
            {{-- <option value="user"  @if($user->role=='user') selected @endif>User</option> --}}
            @foreach (\App\Models\Airline::CRUD_TYPE as $type )
                <option value="{{ $type }}" @if($airline->type==$type) selected @endif>
                    {{ $type }}
                </option>
            @endforeach
            
        </select>
    </div>


   

<div class="pt-3">
    <button class="bg-blue-500 py-2 px-4 rounded-md pt-4 ">Save</button>
</div>
    
    </div>
</form>
@endsection

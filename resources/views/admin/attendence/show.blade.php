@extends('layouts.sidebar')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

    <div class="w-full">
        <div class="text-black text-2xl font-bold py-5 px-8">Attendences Informations
            {{-- <a href="{{ route('attendence.create') }}">
                <button class="bg-blue-500 text-white text-sm rounded-full hover:bg-blue-200 py-2 px-4 text-center float-right">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Add New
                </button>
            </a> --}}
        </div> 
    </div>
    
    <div class="overflow-x-auto relative w-100%">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
            <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        User Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Clock in
                    </th>
                    <th scope="col" class="py-3 px-6">
                        clock out
                    </th>
                    <th scope="col" class="py-3 px-6">
                        late entry
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Early exit
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total hours
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($attendence as $attendence )
                <tr>
                    <td>
                        {{ $attendence->id }}
                    </td>
               
                    <td>
                        {{ $attendence->user_id }}
                    </td>
    
                    <td>
                        {{ $attendence->clock_in }}
                    </td>

                    <td>
                        {{ $attendence->clock_out }}
                    </td>
                    <td>
                        {{ $attendence->late_entry }}
                    </td>
                    <td>
                        {{ $attendence->early_exit }}
                    </td>
                    <td>
                        {{ $attendence->total_hour }}
                    </td>
                    <td>
                        {{ $attendence->date }}
                    </td>
                
                
                
                
                
                    
                    {{-- <td>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                            <a href="{{ route('airline.show',$airline) }}">
                                Show
                            </a>
                        </button> 
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            <a href="{{ route('airline.edit',$airline) }}">
                                Edit
                            </a>
                        </button> 
    
                       
    
                        <button onclick="show({{$airline->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            
                                Delete
                            </a>
                        </button>  --}}
                    {{-- </form> --}}
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

         <!-- Delete -->
<div class="hidden deleteModal backdrop-blur-lg fixed top-0 left-0 right-0 bottom-0 p-2 bg-gray-800 bg-opacity-25 border-red-100 rounded-md shadow-xl w-full flex-center">
    <div class="flex justify-center">
        <div class="bg-white shadow-lg rounded-md w-96 h-96 mt-[10%]">
            <div class="text-center text-black text-xl py-10 px-10 mt-2">
               <h1 class="font-bold"> Are you sure?</h1>
            </div>

            <div class="flex text-center px-40 gap-5 justify-center">
                <button class="py-2 px-4 bg-blue-400 justify-center mr-5" onclick="hide()">No</button>
                    <form action="{{route('airline.delete')}}" method="post">
                        @csrf
                        <input type="hidden" value="1" id="airline-id" name="airline-id">
                        <button type="submit" class="py-2 px-4 bg-blue-400 justify-center ">yes</button>
                    </form>
            </div>
        </div>
        
    </div>
    
        
    </div>
</div>
</div>



    </div>



@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
{{-- <script>
    function show($id) {
        document.getElementById('airline-id').value = $id;
        $('.deleteModal').removeClass('hidden');

    }
    function hide(){
        $('.deleteModal').addClass('hidden');
    }

    function deleteAirline() {
        $id = document.getElementById('airline-id').value; 
        hide();

    }
    
</script> --}}
@endsection
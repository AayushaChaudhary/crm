@extends('layouts.sidebar')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')


<div class=" shadow-md">
    <div class="w-full">
        <div class="text-black text-xl font-bold py-5 px-8"> Client Upcomming Birthday!
            {{-- <a href="{{ route('user.create') }}">
                <button class="bg-blue-500 text-white text-sm rounded-full hover:bg-blue-200 py-2 px-4 text-center float-right">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Add New
                </button>
            </a> --}}
        </div> 
    </div>
    
    <div class="overflow-x-auto relative w-100%">
        <table class="w-full m-6  antialiased font-bold text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
            <thead class="text-xs antialiased font-bold text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Address
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Remaining
                    </th>
                   
                    <th scope="col" class="py-3 px-6">
                        dob
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($upcomings as $client )
                <tr>
                    <td>
                        {{ $client->id }}
                    </td>
               
                    <td>
                        {{ $client->name }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                    <td>
                        {{ $client->address}}
                    </td>
                    <td>
                        {{ $client->remaining }}
                    </td>
                    <td>
                        {{ $client->dob}}
                    </td>
                
                  
    
                    {{-- <td>
                        <button class="btn btn-outline-danger btn-sm">
                            <a href="{{ route('user.show',$user) }}">
                                <i class="fa-sharp fa-solid fa-eye y-2 px-2 text-black rounded-full bg-red-500 p-2 "></i>
                            </a>
                        </button> 
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            <a href="{{ route('user.edit',$user) }}">
                                Edit
                            </a>
                        </button> 

                        <button>
                            <a href="{{ route('user.view', $user->id)}}">
                                <i class="fa-sharp fa-solid fa-eye  dark:bg-gray-500 py-2 px-3 rounded-full"></i></a>
                            
                        </button>
    
                       
    
                        <button onclick="show({{$user->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            
                                Delete
                            </a>
                        </button> 
                    {{-- </form> --}}
                        
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>


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
<script>
    function show($id) {
        document.getElementById('user-id').value = $id;
        $('.deleteModal').removeClass('hidden');

    }
    function hide(){
        $('.deleteModal').addClass('hidden');
    }

    function deleteUser() {
        $id = document.getElementById('user-id').value; 
        hide();

    }
    
</script>
@endsection
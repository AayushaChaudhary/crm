@extends('layouts.sidebar')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')


<div class=" shadow-md">
    <div class="w-full">
        <div class="text-black text-xl font-bold py-5 px-8">Users Informations
            <a href="{{ route('user.create') }}">
                <button class="bg-blue-500 text-white text-sm rounded-full hover:bg-blue-200 py-2 px-4 text-center float-right">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Add New
                </button>
            </a>
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
                        dob
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Address
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Phoneno
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Role
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Post
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Bloodgroup
                    </th>
                    <th scope="col" class="py-3 px-6">
                        entry Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        exit Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user )
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
               
                    <td>
                        {{ $user->name }}
                    </td>
    
                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->dob}}
                    </td>
                
                    <td>
                        {{ $user->address }}
                    </td>
               
                    <td>
                        {{ $user->phoneno }}
                    </td>
    
                    <td>
                        {{ $user->role }}
                    </td>
    
                    <td>
                        {{ $user->post }}
                    </td>
                    <td>
                        {{ $user->bloodgroup }}
                    </td>

                    <td>
                        {{ $user->entry_time }}
                    </td>

                    <td>
                        {{ $user->exit_time }}
                    </td>
    
                    <td>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                            <a href="{{ route('user.show',$user) }}">
                                Show
                            </a>
                        </button> 
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            <a href="{{ route('user.edit',$user) }}">
                                Edit
                            </a>
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
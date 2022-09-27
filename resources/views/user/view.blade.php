@extends('layouts.sidebar')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="shadow-lg">
    <div class="w-full">
        <div class="text-black text-xl font-bold py-5 px-8">Task Informations
            <a href="{{ route('user.index') }}">
                <button class="bg-blue-500 text-white text-sm rounded-full hover:bg-blue-200 py-2 px-4 text-center float-right">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Back
                </button>
            </a>
        </div> 
    </div>
    
    <div class="overflow-x-auto relative w-100%">
        <table class="w-full m-6 shadow-lg text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
            <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        User
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Client
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Department
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Purpose
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Remarks
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($task as $task )
                <tr>
                    <td>
                        {{ $task->id }}
                    </td>
               
                    <td>
                        {{ $task->user->name }}
                    </td>
                    <td>
                        {{ $task->client->name }}
                    </td>
                    <td>
                        {{ $task->department->title }}
                    </td>
                    <td>
                        {{ $task->purpose->name }}
                    </td>
                    <td>
                        {{ $task->remarks }}
                    </td>
                    <td>
                        {{ $task->status }}
                    </td>


    
                   
                        
                    {{-- </form> --}}
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

         <!-- Delete -->
      
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

@endsection
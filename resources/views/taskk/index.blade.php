@extends('layouts.sidebar')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('main')

<div class="shadow-lg">
    <div class="w-full">
        <div class="text-black text-xl font-bold py-5 px-8">Task Informations
            {{-- <a href="{{ route('task.create') }}">
                <button class="bg-blue-500 text-white text-sm rounded-full hover:bg-blue-200 py-2 px-4 text-center float-right">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Add New
                </button>
            </a> --}}
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
                    <th scope="col" class="py-3 px-6">
                        Action
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


    
                    <td>
                        <button>
                            <a href="{{ route('task.show',$task) }}">
                                <i class="fa-sharp fa-solid fa-eye y-2 px-2 text-blue-500 text-xl "></i>
                            </a>
                        </button> 
                        <button>
                            <a href="{{ route('task.edit',$task) }}">
                                <i class="fa-sharp fa-solid fa-pen-to-square y-2 px-2 text-green-500 text-xl"></i>
                            </a>
                        </button> 
    
                       
    
                        <button onclick="show({{$task->id}})">
                            
                            <i class="fa-sharp fa-solid fa-trash y-2 px-2 text-red-500 text-xl"></i>
                            </a>
                        </button>
                        <div class="flex flex-justify gap-2">
                            <form action="{{ route('task.pending',$task->id) }}" method="post">
                                @csrf
                                <input type="hidden" id="pending" name="pending">
                                <button type="submit" class="py-2 px-4 bg-blue-400 justify-center ">Pending</button>
                            </form>
                            <form action="{{ route('task.complete',$task->id) }}" method="post">
                                @csrf
                                <input type="hidden" id="complete" name="complete">
                                <button type="submit" class="py-2 px-4 bg-blue-400 justify-center ">complete</button>
                            </form>

                            <form action="{{ route('task.processing',$task->id) }}" method="post">
                                @csrf
                                <input type="hidden" id="processing" name="processing">
                                <button type="submit" class="py-2 px-4 bg-blue-400 justify-center ">Processing</button>
                            </form>
                        </div>
                       
                       
                        
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
                            <form action="{{route('task.delete')}}" method="post">
                                @csrf
                                <input type="hidden" value="1" id="task-id" name="task-id">
                                <button type="submit" class="py-2 px-4 bg-blue-400 justify-center ">yes</button>
                            </form>
                    </div>
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
<script>
   function show($id) {
        document.getElementById('task-id').value = $id;
        $('.deleteModal').removeClass('hidden');

    }
    function hide(){
        $('.deleteModal').addClass('hidden');
    }

    function deleteTask() {
        $id = document.getElementById('task-id').value; 
        hide();

    }
</script>
@endsection
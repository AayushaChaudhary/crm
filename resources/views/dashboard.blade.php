@extends('layouts.sidebar')
@section('main')
<div class="shadow-lg h-full">
    <div class="w-full">
   
    <div class="flex md:flex-row gap-10 justify-end mt-5 flex-col px-5">
        <div class="block rounded-lg bg-blue-500 shadow-lg p-2  hover:bg-indigo-500 hover:text-white">
           
            <button class="font-bold text-black hover:text-white pl-2" onclick="show()">
                <i class="fa-solid fa-clock pr-2"></i>Clock In </button>
        </div>

        <div class="block rounded-lg bg-blue-500 shadow-lg p-2 hover:bg-indigo-500 hover:text-white">
            
            <button class="font-bold text-black pl-2 hover:text-white" onclick="cshow()">
                <i class="fa-solid fa-clock pr-2"></i>Clock Out</button>
        </div>

        
    </div>
<div class="flex flex-col flex-wrap gap-5 m-6 md:flex-row">
    <div class="flex h-20 p-2 bg-white border-red-100 rounded-md shadow-xl w-70">
        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
        <div class="mx-4 mt-4 ">
        <div class="antialiased font-bold text-gray-600 ">Total Attendences</div>
        <div class="text-sm text-gray-600">{{ $attendance }}</div>
        </div>
    </div>
    <div class="flex h-20 p-2 bg-white border-red-100 rounded-md shadow-xl w-60">
        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
        <div class="mx-4 mt-4 ">
        <div class="antialiased font-bold text-gray-600 ">Followers</div>
        <div class="text-sm text-gray-600">16</div>
        </div>
    </div>
    <div class="flex h-20 p-2 bg-white border-red-100 rounded-md shadow-xl w-60">
        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
        <div class="mx-4 mt-4 ">
        <div class="antialiased font-bold text-gray-600 ">Profile Views</div>
        <div class="text-sm text-gray-600">16</div>
        </div>
    </div>
    <div class="flex h-20 p-2 bg-white border-red-100 rounded-md shadow-xl w-60">
        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
        <div class="mx-4 mt-4 ">
        <div class="antialiased font-bold text-gray-600 ">Profile Views</div>
        <div class="text-sm text-gray-600">16</div>
        </div>
    </div>
</div>
    


    <!-- clock in -->
    <div class=" hidden  showbox backdrop-blur-lg fixed top-0 left-0 right-0 bottom-0 p-2 bg-gray-800 bg-opacity-25 border-red-100 rounded-md shadow-xl w-full flex-center">
        <div class="flex justify-center">
            <div class="bg-white shadow-lg rounded-md w-96 h-96 mt-[10%]">
                <div class="py-3 px-5">
                    <a href="{{ route('dashboard') }}">
                    <i class="fa-sharp fa-solid fa-circle-xmark float-right ">
                        </i> 
                   
                    </a>
                </div>
                <div class="text-center text-black text-xl py-10 px-10 mt-2">
                   <h1 class="font-bold">Remarks</h1>
                </div>
    
                <div class="flex text-center px-40 gap-5 justify-center">
                        <form action="{{ route('attendence.store') }}" method="post">
                            @csrf
                            <textarea class="flex justify-center" name="reason" placeholder="Reason here...."></textarea>
                            <div class="pt-3">
                                <button type="submit"  class="py-2 px-4 bg-blue-400 justify-center ">
                                    
                                    submit</button>
                            </div>
                           
                        </form>
                </div>
            </div>
            
        </div>
        
            
        </div>

        <!-- clock out -->

        <div class=" hidden  cshowbox backdrop-blur-lg fixed top-0 left-0 right-0 bottom-0 p-2 bg-gray-800 bg-opacity-25 border-red-100 rounded-md shadow-xl w-full flex-center">
            <div class="flex justify-center">
                <div class="bg-white shadow-lg rounded-md w-96 h-96 mt-[10%]">
                    <div class="py-3 px-5">
                        <a href="{{ route('dashboard') }}">
                        <i class="fa-sharp fa-solid fa-circle-xmark float-right ">
                            </i> 
                       
                        </a>
                    </div>
                    <div class="text-center text-black text-xl py-10 px-10 mt-2">
                       <h1 class="font-bold">Remarks</h1>
                    </div>
        
                    <div class="flex text-center px-40 gap-5 justify-center">
                        @if (isset($attendence))
                            <form action="{{ route('attendence.update', $attendence->id) }}" method="post">
                               
                                @csrf
                                @method('PUT')
                                <textarea class="flex justify-center" name="reason1" id="reason1" placeholder="Reason here...."></textarea>
                                <div class="pt-3">
                                    <button type="submit"  class="py-2 px-4 bg-blue-400 justify-center ">
                                        
                                        submit</button>
                                </div>
                               
                            </form>
                            @endif
                    </div>
                </div>
                
            </div>
            
                
            </div>
</div>
</div>

<script>
     function show() {
        $('.showbox').removeClass('hidden');

    }
    function hide(){
        $('.showbox','.cshowbox').addClass('hidden');
    }

    function cshow() {
        $('.cshowbox').removeClass('hidden');
    }



    
</script>

@endsection



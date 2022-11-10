<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

<!--jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <!-- Fontawesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('css')
    </head>
    <body class="font-sans antialiased">
        {{-- sidebar  --}}
         <div class="flex ">
            <div class="h-screen">

                <nav class="hidden z-[999] h-screen fixed hover:overflow-scroll  bg-white shadow-lg w-72 md:block">
                    <div class="p-6 mx-8">
                        <ul class="text-xl antialiased font-bold text-blue-500">
                            <li class="px-2 text-3xl"><i class="fa-sharp fa-solid fa-house"> CRM</i>
                               
                            </li> 

                            <li class="px-2 text-black py-3 rounded-md text-xl">
                                <i class="fa-sharp fa-solid fa-user"> {{ auth()->user()->name }} </i>
                                    
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                    <hr class=" mx-auto w-48 h-1 bg-black rounded border-0  dark:bg-gray-700">

                    <div class="px-6 py-2 mx-2">
                        <ul class=" antialiased font-bold text-gray-500 text-md ">

                            <a href="{{ route('dashboard') }}">
                            <li class="{{request()->routeIs('dashboard') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4  text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                               
                                    <i class="pr-2 fa-solid fa-gauge-high"></i>
                                    Dashboard
                               
                                
                            </li>
                        </a>

                            @if(auth()->user()->role ==="Admin" || auth()->user()->role ==="Desk")
                            <a href="{{ route('department.index') }}">
                            <li class="{{request()->routeIs('department*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                
                                    <i class="fa-sharp fa-solid fa-building-user"></i>
                                    Department
                            </li>
                        </a>
                            @endif


                            @if(auth()->user()->role ==="Admin" || auth()->user()->role ==="Desk")
                            <a href="{{ route('client.index') }}">
                            <li class="{{request()->routeIs('client*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                
                                    <i class="pr-2 fa-solid fa-users"></i>
                                    Clients 
                            </li>
                        </a>
                            @endif


                            @if(auth()->user()->role ==="Admin")
                            <a href="{{ route('user.index') }}">
                            <li class="{{request()->routeIs('user*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                
                                <i class="pr-2 fa-solid fa-table"></i>
                                    Users
                               
                                
                                </li>
                            </a>
                            @endif

                            <a href="{{ route('airline.index') }}">
                                <li class="{{request()->routeIs('airline*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                        Airlines
                                   
                                    
                                </li>
                            </a>

                            <a href="{{ route('attendence.index') }}">
                                <li class="{{request()->routeIs('attendence*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-clipboard-user"></i>
                                        Attendences
                                </li>
                            </a>

                            <a href="{{ route('purpose.index') }}">
                                <li class="{{request()->routeIs('purpose*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-address-book"></i>
                                        Purpose
                                </li>
                            </a>


                                @if(auth()->user()->role ==="Admin")
                                <a href="{{ route('task.index') }}">
                                <li class="{{request()->routeIs('task.index') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-laptop-file"></i>
                                         All Tasks
                                   
                                    
                                </li>
                            </a>
                                @endif

                                <a href="{{ route('task.mytask') }}">
                                <li class="{{request()->routeIs('task.mytask') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-laptop-code"></i>
                                        My Task
                                </li>
                            </a>

                            <a href="{{ route('leave.index') }}">
                            <li class="{{request()->routeIs('leave*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-envelope"></i>
                                        Leave 
                                </li>
                            </a>

                                @if(auth()->user()->role ==="Admin")
                                <a href="{{ route('admin.leaves') }}">
                                <li class="{{request()->routeIs('admin.leaves') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-envelope"></i>
                                        Leave Applications
                                    
                                </li>
                            </a>
                                @endif

                                @if(auth()->user()->role ==="Admin")
                                 <li  onclick = "birthdayToggle()" class="{{request()->routeIs('birthday*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                            <i class="fa-sharp fa-solid fa-cake-candles"></i>
                                            Birthday
                                         
                                    
                                </li>
                                @endif

                                <a href="{{ route('birthday.index') }}">
                                <li class="{{request()->routeIs('birthday.index') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} hidden birthday px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white pl-6">
                                    
                                        <i class="fa-sharp fa-solid fa-cake-candles"></i>
                                        User

                            </li>
                        </a> 

                            <a href="{{ route('birthday.cindex') }}">
                                <li class="{{request()->routeIs('birthday.cindex') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} hidden birthday px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white pl-6">
                                    
                                        <i class="fa-sharp fa-solid fa-cake-candles"></i>
                                        client
                                </a>
                                
                            </li>

                            @if(auth()->user()->role ==="Admin")
                            <a href="{{ route('admin.attendence') }}">
                             <li class="{{request()->routeIs('admin.attendence') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-address-card"></i>
                                        All Attendences
                                </li>
                            </a>
                                @endif

                                <a href="{{ route('tickets.index') }}">
                                      <li class="{{request()->routeIs('tickets*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-newspaper"></i>
                                        Ticket

                                </li>
                            </a>

                                @if(auth()->user()->role ==="Admin" || auth()->user()->role ==="Desk")
                                <a href="{{ route('income.index') }}">
                                <li class="{{request()->routeIs('income*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-brazilian-real-sign"></i>
                                        Income
                                    
                                </li>
                            </a>
                                @endif

                                @if(auth()->user()->role ==="Admin")
                                <a href="{{ route('expenditure.index') }}">
                                <li class="{{request()->routeIs('expenditure*') ?'py-2 px-2 rounded-md bg-gray-300 hover:text-black text-white text-xl' : ''}} px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    
                                        <i class="fa-sharp fa-solid fa-calendar"></i>
                                        Expenditure
                                </li>
                            </a>
                                @endif

                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                <li class="px-2 text-black py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                                    
                                     
                                      <i class="fa-sharp fa-solid fa-person-walking-arrow-right"></i><input type="submit" value="Logout">
                                    
                                   </li>
                                </form>

                                
                        </ul>
                    </div>
                </nav> 


            </div>
            <div class="w-full p-4 lg:: ml-72">
                @yield('main')
                @yield('js')

                <script>
                    function birthdayToggle(){
            $('.birthday').toggleClass('hidden');
        }
            </script>

            </div>
        </div>

        
    </body>
</html>

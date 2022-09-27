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

                <nav class="hidden h-screen fixed hover:overflow-scroll  bg-blue-200 shadow-lg w-72 md:block">
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
                    <hr class=" mx-auto w-48 h-1 bg-gray-100 rounded border-0  dark:bg-gray-700">

                    <div class="px-6 py-2 mx-2">
                        <ul class=" antialiased font-bold text-gray-500 text-md ">
                            
                            

                            <li class="px-4  text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                <a href="{{ route('dashboard') }}">
                                    <i class="pr-2 fa-solid fa-gauge-high"></i>
                                    Dashboard
                                </a>
                                
                            </li>

                            <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                <a href="{{ route('department.index') }}">
                                    <i class="fa-sharp fa-solid fa-building-user"></i>
                                    Department
                                </a>
                            </li>

                            <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                <a href="{{ route('client.index') }}">
                                    <i class="pr-2 fa-solid fa-users"></i>
                                    Clients
                                </a>
                                
                            </li>
                            <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                @if(auth()->user()->role ==="Admin")
                                <a href="{{ route('user.index') }}"><i class="pr-2 fa-solid fa-table"></i>
                                    Users
                                </a>
                                @endif
                                </li>

                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('airline.index') }}">
                                        <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                        Airlines
                                    </a>
                                    
                                </li>
                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('attendence.index') }}">
                                        <i class="fa-sharp fa-solid fa-clipboard-user"></i>
                                        Attendences
                                    </a>
                                    
                                </li>
                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('purpose.index') }}">
                                        <i class="fa-sharp fa-solid fa-clipboard-user"></i>
                                        Purpose
                                    </a>
                                    
                                </li>
                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('task.index') }}">
                                        <i class="fa-sharp fa-solid fa-laptop-file"></i>
                                         All Tasks
                                    </a>
                                    
                                </li>
                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('task.mytask') }}">
                                        <i class="fa-sharp fa-solid fa-laptop-code"></i>
                                        My Task
                                    </a>
                                    
                                </li>

                                <li class="px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('leave.index') }}">
                                        <i class="fa-sharp fa-solid fa-newspaper"></i>
                                        Leave 
                                    </a>
                                    
                                </li>

                                <li class="px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('admin.leaves') }}">
                                        <i class="fa-sharp fa-solid fa-newspaper"></i>
                                        Leave Applications
                                    </a>
                                    
                                </li>

                                <li class="px-4 text-black  py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('birthday.index') }}">
                                        <i class="fa-sharp fa-solid fa-cake-candles"></i>
                                        Birthday
                                    </a>
                                    
                                </li>

                                <li class="px-4 text-black py-2 rounded-md hover:bg-blue-500 hover:text-white">
                                    <a href="{{ route('admin.attendence') }}">
                                        <i class="fa-sharp fa-solid fa-newspaper"></i>
                                        All Attendences
                                    </a>
                                    
                                </li>

                                
                        </ul>
                    </div>
                </nav> 


            </div>
            <div class="w-full p-4 lg:: ml-72">
                @yield('main')
                @yield('js')
            </div>
        </div>
        
        
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
         <div class="flex">
            <div>

                <nav class="hidden h-screen bg-white shadow-lg w-72 md:block">
                    <div class="p-6 mx-8">
                        <ul class="text-xl antialiased font-bold text-blue-500">
                            <li><i class="pr-2 fa-solid fa-user"></i>
                                CRM
                            </li> 
                        </ul>
                    </div>

                    <div class="px-6 py-2 mx-2">
                        <ul class="text-xl antialiased font-bold text-gray-500 text-md ">
                            <li class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white">
                                <a href="{{ route('dashboard') }}">
                                    <i class="pr-2 fa-solid fa-gauge-high"></i>
                                    Dashboard
                                </a>
                                
                            </li>

                            <li class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white">
                                <a href="{{ route('department.index') }}">
                                    <i class="fa-sharp fa-solid fa-window"></i>
                                    Department
                                </a>
                            </li>

                            <li class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white">
                                <a href="{{ route('client.index') }}">
                                    <i class="pr-2 fa-solid fa-users"></i>
                                    clients
                                </a>
                                
                            </li>
                            <li class="px-4 py-4 rounded-md hover:bg-indigo-600 hover:text-white">
                                @if(auth()->user()->role ==="Admin")
                                <a href="{{ route('user.index') }}"><i class="pr-2 fa-solid fa-table"></i>
                                    Users
                                </a>
                                @endif
                                </li>

                                <li class="px-4 py-2 rounded-md hover:bg-indigo-500 hover:text-white">
                                    <a href="{{ route('airline.index') }}">
                                        <i class="pr-2 fa-solid fa-users"></i>
                                        Airlines
                                    </a>
                                    
                                </li>
                        </ul>
                    </div>
                </nav> 


            </div>
            <div class="w-full p-4">
                @yield('main')
                @yield('js')
            </div>
        </div>
        
        
    </body>
</html>

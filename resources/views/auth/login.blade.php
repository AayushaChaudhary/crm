
@extends('layouts.app')
@section('main')

<div class="bg-white h-full w-full px-40 py-10">
    <div class="container bg-white rounded-3xl shadow-lg h-full ">
        <div class="grid h-full md:grid-cols-2">
            <div class="bg-white mt-[50%] -translate-y-[40%] border-shadow-md">
                <div class="mx-6 py-5">

                     <!-- validation error-->
                     <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <h1 class="text-3xl font-bold text-center">Welcome back</h1>
                    <p class="text-sm font-semibold text-center text-black mb-3">Please enter your details<p>
                    <div class="flex justify-center w-6/12 mx-auto">
                        <form  class="w-full" method="POST" action="{{ route('login') }}">
                            @csrf
                                
                            

                            <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full rounded-lg" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                             <!-- Password -->
                             <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="block mt-1 w-full rounded-lg"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                            </div>

                            <x-button class="ml-3 mt-3">
                                {{ __('Log in') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-green-700 border-shadow-md rounded-3xl hidden md:block">
                 <img src="{{ asset('images/fig.jpg') }}" class="h-full rounded-3xl">
            </div>
        </div>
    </div>
</div>
@endsection






{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

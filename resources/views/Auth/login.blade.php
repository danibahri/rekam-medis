@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex w-full min-h-screen justify-center items-center bg-amber-300 px-4">
        <div class="flex flex-col lg:flex-row h-full w-full max-w-7xl gap-8 items-center">
            <div class="flex flex-col gap-8 justify-center items-center w-full lg:w-1/2 h-full">
                <h1 class="font-bold text-4xl md:text-5xl text-white text-center">Welcome!</h1>
                <img class="w-60 md:w-80 drop-shadow-lg" src="{{ asset('icon/icon.png') }}" alt="Icon-THT">
            </div>
            <div class="flex flex-col justify-center items-center w-full lg:w-1/2 h-full">
                <div
                    class="p-6 md:p-8 bg-white rounded-3xl flex flex-col justify-center items-center relative w-full max-w-md shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="black" class="size-20 absolute -top-10 bg-white rounded-full p-3 shadow-sm">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-6 mt-12 w-full">
                        @csrf
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <input type="username" name="username" id="username" class="p-2 rounded-md w-full border"
                                required placeholder="Username" autofocus>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <input type="password" name="password" id="password" class="p-2 rounded-md w-full border"
                                required placeholder="**********">
                        </div>
                        <button type="submit"
                            class="bg-white p-2 rounded-md hover:bg-gray-200 cursor-pointer border-2 border-slate-300 hover:border-slate-600 transition">
                            Login
                        </button>
                        @if ('errors')
                            <div class="text-red-500 text-sm text-center">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

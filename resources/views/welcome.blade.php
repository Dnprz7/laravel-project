<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photogram</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

</head>

<body class="bg-black">
    {{-- NAV SCREEN --}}
    <div class="hidden sm:hidden max-w-screen-lg mx-auto bg-gray-200 md:flex md:h-screen md:visible">
        {{-- PHOTO --}}
        <div class="md:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('img/photogram.webp') }}');">
        </div>
        {{-- MENU --}}
        <div class="bg-black md:w-1/2 p-8 flex flex-col justify-center items-center">
            <div class="bg-gray-100 p-8 rounded-xl shadow-2xl w-full h-full flex flex-col justify-between">
                <div class="p-2 flex flex-col items-center mb-4" style="box-shadow: 0 3px 10px rgb(0,0,0,0.2);">
                    <img src="{{ asset('img/photogram2.gif') }}" alt="Logo"
                        class="pt-2 w-1/4 h-auto mb-2 md:max-h-full">
                    <h2 class="text-lg font-semibold mb-2 text-center">Photogram</h2>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center mb-4">
                        <button
                            class="border border-gray-700 w-44 bg-transparent hover:bg-gray-300 text-black font-bold py-3 px-5 rounded mb-2 transition-colors duration-300 ease-in-out">
                            Login
                        </button>
                        <button
                            class="border border-gray-700 w-44 bg-transparent hover:bg-gray-300 text-black font-bold py-3 px-5 rounded mb-2 transition-colors duration-300 ease-in-out">
                            Register
                        </button>
                    </div>
                    <p class="text-sm text-center mb-4">Login or Register to have the Photogram
                        experience</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-sm text-gray-700 text-center">Daniel Perez - Crazy Imagine Software 2024</p>
                </div>
            </div>
        </div>
    </div>
    {{-- MOBILE SCREEN --}}
    <div class="bg-black flex justify-center items-center">
        <div class="flex flex-col h-screen justify-center items-center px-4">
            <div class="bg-gray-200 w-full p-8 rounded-xl">
                <div class="p-2 flex flex-col items-center mb-16" style="box-shadow: 0 3px 10px rgb(0,0,0,0.2);">
                    <img src="{{ asset('img/photogram2.gif') }}" alt="Logo"
                        class="pt-2 w-1/4 h-auto mb-2 md:max-h-full">
                    <h2 class="text-lg font-semibold mb-2 text-center">Photogram</h2>
                </div>
                <div class="flex flex-col items-center justify-center mb-16">
                    <button
                        class="border border-gray-700 w-44 bg-transparent hover:bg-gray-300 text-black font-bold py-3 px-5 rounded mb-2 transition-colors duration-300 ease-in-out">
                        Login
                    </button>
                    <button
                        class="border border-gray-700 w-44 bg-transparent hover:bg-gray-300 text-black font-bold py-3 px-5 rounded mb-2 transition-colors duration-300 ease-in-out">
                        Register
                    </button>
                    <p class="text-sm text-center">Login or Register to have the Photogram
                        experience</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-sm text-gray-700 text-center">Daniel Perez - Crazy Imagine Software 2024</p>
                </div>
            </div>
        </div>
    </div>


</html>

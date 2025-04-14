<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="image/png" href="{{ asset('logobiru.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])

    </head>
    <section style="
        background-image: url(/images/Login.jpg);
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        width: 100vw;
        height: 100vh;"
        class="bg-center min-h-screen w-full">

        <a href="/" class="absolute top-4 left-4 text-lg flex items-center gap-2 text-white px-4 py-2 rounded-lg shadow-md">
                <i class="fa-solid fa-angle-left"></i>
                <span>Kembali</span>
        </a>


        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl shadow-[0_0_15px_2px_rgba(255,255,255,0.6)] md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 mx-5">

                    <!-- Header -->

                    <div class="flex items-center justify-center flex-col space-y-2">
                    <h1 class="font-bold leading-tight tracking-tight mt-4 mb-2 text-transparent bg-clip-text bg-gradient-to-b from-[#27A1FF] to-[#3285D8] md:text-4xl text-2xl">
                        Masuk
                    </h1>

                        <p class="text-sm text-center">Inputkan kode dan kata sandi untuk melanjutkan.</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form Login -->

                    <form class="space-y-4 md:space-y-4" action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" class="bg-white text-sm border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Inputkan username" required>
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata sandi</label>
                            <input type="password" name="password" id="password" placeholder="Inputkan kata sandi"
                                   class="bg-white border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                   required>
                        </div>

                        <div class="flex justify-end">
                            <a href="/forgotpassword" class="text-sm text-[#27A1FF]">Forgot Password?</a>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="text-white mt-2 mb-2 bg-gradient-to-b from-[#7CABCF] to-[#3285D8] hover:from-primary-600 hover:to-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-7 py-2.5 text-center shadow-[0px_5px_15px_rgba(0,0,0,0.3)]">
                                Masuk
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </section>
</html>

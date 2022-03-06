<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
        <title>LOGIN</title>
    </head>
    <body>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="max-w-sm m-4 p-10 bg-black bg-opacity-25 rounded shadow-xl">

                        <p class="text-white font-medium text-center text-lg font-bold">LOGIN</p>

                        @csrf

                        <div>
                            <label class="block text-sm text-white mb-2" for="email">E-mail</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" id="email"  type="email" name="email" :value="old('email')" required autofocus>
                        </div>

                        <div class="mt-2">
                            <label class="block  text-sm text-white mb-2">Password</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                            type="password" id="password" type="password" name="password" required autocomplete="current-password">
                        </div>

                        <div class="mt-4 items-center flex justify-between">
                            @if (Route::has('password.request'))
                                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 text-white hover:text-red-400"
                                    href="{{ route('password.request') }}">{{ __('Forgot your password ?') }}
                                </a>
                            @endif
                        </div>

                        <div class="text-center mt-10">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                                type="submit">{{ __('Log in') }}
                            </button>
                        </div>

                        <div class="text-center mt-10">
                            <a href="/register" class="border-2 border-white rounded-lg font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-white hover:text-black">
                                Create an account
                            </a>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
        <style>
        .login{
        /*
            background: url('https://tailwindadmin.netlify.app/dist/images/login-new.jpeg');
        */
        background: url('http://bit.ly/2gPLxZ4');
        background-repeat: no-repeat;
        background-size: cover;
        }
        </style>
    </body>
</html>

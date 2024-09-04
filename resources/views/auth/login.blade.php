@extends('layouts.app')

@section('page.title', 'Registration')

@section('content')

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="{{ asset('assets/minimized-logo.png') }}"
                 alt="Pinterest">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login_user') }}" method="POST">
                @csrf

                <div>
                    <label for="email_or_login" class="block text-sm font-medium leading-6 text-gray-900">Email address / Login</label>
                    <div class="mt-2">
                        <input id="email_or_login" name="email_or_login" type="text" value="{{ old('email_or_login') }}"
                               placeholder="Type your email address or your login here" required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-red-600 hover:text-red-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="flex items-center me-4">
                    <input checked id="red-checkbox" name="remember_me" type="checkbox" value=""
                           class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="red-checkbox"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 transition-colors">
                        Login
                    </button>
                </div>
            </form>

            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-64 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <span
                    class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or</span>
            </div>

            <p class="text-gray-500 dark:text-gray-400">
                If you don't have an account <a href="{{ route('register') }}" class="border-b-2 border-b-red-400 text-red-600">create one</a>
            </p>
        </div>
    </div>

@endsection

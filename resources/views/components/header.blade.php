<header class="bg-white border-b-2 border-b-gray-100">
    <nav class="mx-auto flex max-w-7xl items-center justify-between lg:px-8 h-1 py-10 overflow-hidden"
         aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <img class="h-auto w-52" src="{{ asset('assets/logo.png') }}" alt="Pinterest logo">
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-7">
            <a href="#"
               class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 rounded-2xl transition-colors {{ active_if('for_you') }}">
                For you
            </a>
            <a href="#"
               class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 rounded-2xl transition-colors {{ active_if('add_img') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </a>
            <a href="#"
               class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 rounded-2xl transition-colors {{ active_if('likes') }}">Likes</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
                <div class="flex items-center gap-4 hover:cursor-pointer"
                     data-dropdown-toggle="userDropdown"
                     data-dropdown-placement="bottom-end">
                    <img class="w-8 h-8 rounded-full" src="{{ asset('assets/minimized-logo.png') }}"
                         alt="Profile image">
                    <div class="font-medium dark:text-white text-[13px]">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="text-gray-500 dark:text-gray-400">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </div>

                <!-- Dropdown menu -->
                <div id="userDropdown"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="{{ route('logout_user') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                   class="text-sm font-semibold leading-6 bg-red-600 text-white hover:opacity-90 active:opacity-80 transition-opacity px-5 py-1.5 rounded-3xl me-5">Log
                    in</a>
                <a href="{{ route('register') }}"
                   class="text-sm font-semibold leading-6 border-2 border-red-600 text-red-600 hover:text-white hover:bg-red-600 active:opacity-80 transition-all px-4 py-1.5 rounded-3xl">Sign
                    up</a>
            @endauth
        </div>
    </nav>
</header>

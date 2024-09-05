<div
    class="fixed z-50 w-full h-16 max-w-72 shadow-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
    <div class="grid h-full max-w-72 grid-cols-3 mx-auto">
        <a href="{{ route('home') }}"
           class="inline-flex flex-col items-center justify-center px-5 rounded-s-full dark:hover:bg-red-800 group">
            <svg
                class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 dark:group-hover:text-red-500 {{ bottom_on_if('home') }} transition-colors"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            <span class="sr-only">Home</span>
        </a>
        <div class="flex items-center justify-center">
            <a href="">
                <button type="button" data-tooltip-target="tooltip-animation"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium rounded-full border-2 hover:bg-red-600 group focus:ring-4 focus:ring-red-300 focus:outline-none dark:focus:ring-red-800 transition-colors">
                    <svg class="w-4 h-4 text-red-600 group-hover:text-white transition-colors" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 1v16M1 9h16"/>
                    </svg>
                    <span class="sr-only">New pin</span>
                </button>

                <div id="tooltip-animation" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Create new pin
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </a>
        </div>
        <a href="{{ route('profile') }}"
           class="inline-flex flex-col items-center justify-center px-5 rounded-e-full group">
            <svg
                class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-500 {{ bottom_on_if('profile', 'likes', 'settings') }} transition-colors"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
            </svg>
            <span class="sr-only">Profile</span>
        </a>
    </div>
</div>

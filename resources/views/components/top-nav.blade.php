<div class="border-b border-red-200 dark:border-gray-700">
    <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="{{ route('my_pins') }}"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('my_pins') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group"
               aria-current="page">
                <svg width="16px" height="16px" viewBox="0 0 16 16" fill="currentColor"
                     class="w-4 h-4 me-2 {{ Route::is('my_pins') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                </svg>
                My pins
            </a>
        </li>
        <li class="me-2">
            <a href="{{ route('saves') }}"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('saves') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group"
               aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     class="w-4 h-4 me-2 {{ Route::is('saves') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                </svg>
                Saves
            </a>
        </li>
        <li class="me-2">
            <a href="{{ route('profile') }}"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('profile') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     class="w-4 h-4 me-2 {{ Route::is('profile') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
                Profile
            </a>
        </li>
        <li class="me-2">
            <a href="{{ route('settings') }}"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('settings') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     class="w-4 h-4 me-2 {{ Route::is('settings') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                Settings
            </a>
        </li>
    </ul>
</div>

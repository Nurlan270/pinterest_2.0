<div class="border-b border-red-200 dark:border-gray-700">
    <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="{{ route('profile') }}"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('profile') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group">
                <svg
                    class="w-4 h-4 me-2 {{ Route::is('profile') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                </svg>
                Profile
            </a>
        </li>
        <li class="me-2">
            <a href="#"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('#') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group"
               aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     class="w-4 h-4 me-2 {{ Route::is('#') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"/>
                </svg>
                Likes
            </a>
        </li>
        <li class="me-2">
            <a href="#"
               class="inline-flex items-center justify-center p-4 border-b-2 {{ Route::is('#') ? 'text-red-600 border-red-600 active dark:text-red-500 dark:border-red-500' : 'border-transparent rounded-t-lg hover:text-red-600 hover:border-red-300 dark:hover:text-red-300' }} group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     class="w-4 h-4 me-2 {{ Route::is('#') ? 'text-red-600 dark:text-red-500' : 'text-red-400 group-hover:text-red-500 dark:text-red-500 dark:group-hover:text-red-300' }}"
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

@extends('layouts.app')

@section('page.title', $pin->title)

@section('content')

    <div class="mx-auto shadow-2xl mt-5 mb-28 px-6 py-6 max-w-5xl rounded-3xl grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="rounded-3xl mx-auto my-auto">
            <img src="{{ Storage::url('pins/'.$pin->image) }}" alt="Pin image" class="rounded-3xl">
        </div>
        <div class="flex flex-col">
            <div class="flex items-center justify-end mb-7 gap-2 w-full h-min">
                <div class="flex">
                    <a href="{{ route('download_pin', ['pin' => $pin->image, 'name' => $pin->title]) }}"
                       title="Download pin"
                       class="bg-white text-gray-800 px-3 py-3 border-[1px] rounded-3xl font-extrabold cursor-pointer hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                        </svg>
                    </a>
                    @auth
                        @can('save', $pin)
                            @if($is_saved)
                                <button type="button" id="unsave-btn"
                                        data-pin-id="{{ $pin->id }}"
                                        data-csrf="{{ csrf_token() }}"
                                        class="bg-black text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer ms-3">
                                    Saved
                                </button>
                            @else
                                <button type="button" id="save-btn"
                                        data-pin-id="{{ $pin->id }}"
                                        data-csrf="{{ csrf_token() }}"
                                        class="bg-red-600 text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer hover:bg-red-700 ms-3">
                                    Save
                                </button>
                            @endif
                        @elsecan('delete', $pin)
                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="bg-red-600 text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer hover:bg-red-700 ms-3">
                                Delete pin
                            </button>

                            <div id="popup-modal" tabindex="-1"
                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you sure you want to delete this pin?</h3>
                                            <button data-modal-hide="popup-modal" type="submit" form="delete_pin"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('delete_pin', $pin) }}" method="POST"
                                  id="delete_pin">@method('DELETE') @csrf</form>
                        @endcan
                    @endauth
                </div>
            </div>
            <div class="flex items-center justify-between mb-9">
                <div class="flex items-center gap-4">
                    <a href="{{ route('user', $pin->user_id) }}">
                        <img class="w-14 h-14 rounded-full"
                             src="{{ !empty($pin->author->avatar) ? Storage::url('avatars/'.$pin->author->avatar) : asset('assets/default-avatar.png') }}"
                             alt="Profile picture">
                    </a>
                    <div class="font-medium dark:text-white">
                        <div>
                            <a href="{{ route('user', $pin->user_id) }}" class="no-underline hover:underline">
                                {{ $pin->author->name }}
                            </a>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $pin->author->subscribers()->count() }}
                            Subscribers
                        </div>
                    </div>
                </div>
                @auth
                    @can('subscribe', $pin)
                        @if($is_subscribed)
                            <button type="button" id="unsubscribe-btn"
                                    data-author-id="{{ $pin->user_id }}"
                                    data-pin-id="{{ $pin->id }}"
                                    data-csrf="{{ csrf_token() }}"
                                    class="bg-black text-white rounded-3xl font-semibold px-4 py-2">
                                Unsubscribe
                            </button>
                        @else
                            <button type="button" id="subscribe-btn"
                                    data-author-id="{{ $pin->user_id }}"
                                    data-pin-id="{{ $pin->id }}"
                                    data-csrf="{{ csrf_token() }}"
                                    class="border-[1px] border-gray-300 rounded-3xl hover:bg-gray-100 font-semibold px-4 py-2">
                                Subscribe
                            </button>
                        @endif
                    @endcan
                @endauth
            </div>
            <div class="flex flex-col">
                <h4 class="text-lg mb-3">{{ $pin->title }}</h4>
                <p class="text-sm">{{ $pin->description }}</p>
            </div>
        </div>
    </div>

    @pushonce('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const saveBtn = document.getElementById('save-btn');
                const unsaveBtn = document.getElementById('unsave-btn');
                let isRequestInProgress = false;

                function handleSave(btn, pinId, csrfToken) {
                    if (isRequestInProgress) return;

                    isRequestInProgress = true;
                    btn.style.backgroundColor = '#000';
                    btn.textContent = 'Saving...';

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', `/pins/${pinId}/save`, true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.send();

                    xhr.onload = function () {
                        isRequestInProgress = false;
                        if (xhr.status === 200) {
                            btn.textContent = 'Saved';
                            btn.style.backgroundColor = '#000';

                            const unsaveBtn = document.getElementById('unsave-btn');
                            if (unsaveBtn) {
                                unsaveBtn.textContent = 'Save';
                                unsaveBtn.style.backgroundColor = '#e02424';
                            }

                            btn.id = 'unsave-btn';
                            if (unsaveBtn) unsaveBtn.id = 'save-btn';

                            const newSaveBtn = document.getElementById('save-btn');
                            const newUnsaveBtn = document.getElementById('unsave-btn');
                            if (newSaveBtn) newSaveBtn.onclick = handleSave.bind(null, newSaveBtn, pinId, csrfToken);
                            if (newUnsaveBtn) newUnsaveBtn.onclick = handleUnsave.bind(null, newUnsaveBtn, pinId, csrfToken);
                        } else {
                            btn.textContent = 'Failed';
                            btn.style.backgroundColor = '#f44336';
                        }
                    };
                }

                function handleUnsave(btn, pinId, csrfToken) {
                    if (isRequestInProgress) return;

                    isRequestInProgress = true;
                    btn.style.backgroundColor = '#f44336';
                    btn.textContent = 'Unsaving...';

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', `/pins/${pinId}/unsave`, true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.send();

                    xhr.onload = function () {
                        isRequestInProgress = false;
                        if (xhr.status === 200) {
                            btn.textContent = 'Save';
                            btn.style.backgroundColor = '#f44336';

                            const saveBtn = document.getElementById('save-btn');
                            if (saveBtn) {
                                saveBtn.textContent = 'Saved';
                                saveBtn.style.backgroundColor = '#000';
                            }

                            btn.id = 'save-btn';
                            if (saveBtn) saveBtn.id = 'unsave-btn';

                            const newSaveBtn = document.getElementById('save-btn');
                            const newUnsaveBtn = document.getElementById('unsave-btn');
                            if (newSaveBtn) newSaveBtn.onclick = handleSave.bind(null, newSaveBtn, pinId, csrfToken);
                            if (newUnsaveBtn) newUnsaveBtn.onclick = handleUnsave.bind(null, newUnsaveBtn, pinId, csrfToken);
                        } else {
                            btn.textContent = 'Failed';
                            btn.style.backgroundColor = '#000';
                        }
                    };
                }

                function handleSubscription(button, url, newId, newText, loadingText, addClasses, removeClasses) {
                    const authorId = button.getAttribute('data-author-id');
                    const csrfToken = button.getAttribute('data-csrf');

                    button.disabled = true;
                    const originalText = button.innerHTML;
                    button.innerHTML = loadingText;

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({author_id: authorId})
                    })
                        .then(response => {
                            const contentType = response.headers.get('content-type');
                            if (contentType && contentType.includes('application/json')) {
                                return response.json();
                            } else {
                                return response.text();
                            }
                        })
                        .then(data => {
                            button.id = newId;
                            button.innerHTML = newText;
                            button.classList.remove(...removeClasses);
                            button.classList.add(...addClasses);
                        })
                        .catch(error => {
                            button.innerHTML = "Error";
                        })
                        .finally(() => {
                            button.disabled = false;
                        });
                }

                document.addEventListener('click', function (event) {
                    const button = event.target;

                    if (button.id === 'subscribe-btn') {
                        handleSubscription(
                            button,
                            `/author/${button.getAttribute('data-author-id')}/${button.getAttribute('data-pin-id')}/subscribe`,
                            'unsubscribe-btn',
                            'Unsubscribe',
                            'Subscribing...',
                            ['bg-black', 'text-white'],
                            ['border-[1px]', 'border-gray-300', 'hover:bg-gray-100']
                        );
                    } else if (button.id === 'unsubscribe-btn') {
                        handleSubscription(
                            button,
                            `/author/${button.getAttribute('data-author-id')}/${button.getAttribute('data-pin-id')}/unsubscribe`,
                            'subscribe-btn',
                            'Subscribe',
                            'Unsubscribing...',
                            ['border-[1px]', 'border-gray-300', 'hover:bg-gray-100'],
                            ['bg-black', 'text-white']
                        );
                    }
                });

                if (saveBtn) {
                    saveBtn.onclick = function () {
                        const pinId = saveBtn.getAttribute('data-pin-id');
                        const csrfToken = saveBtn.getAttribute('data-csrf');
                        handleSave(saveBtn, pinId, csrfToken);
                    };
                }

                if (unsaveBtn) {
                    unsaveBtn.onclick = function () {
                        const pinId = unsaveBtn.getAttribute('data-pin-id');
                        const csrfToken = unsaveBtn.getAttribute('data-csrf');
                        handleUnsave(unsaveBtn, pinId, csrfToken);
                    };
                }
            });
        </script>
    @endpushonce
@endsection

@extends('layouts.app')

@section('page.title', $pin->title)

@section('content')

    <div class="mx-auto shadow-2xl mt-5 mb-28 px-6 py-6 max-w-5xl rounded-3xl grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="rounded-3xl mx-auto my-auto">
            <img src="{{ Storage::url('pins/'.$pin->image) }}" alt="Pin image" class="rounded-3xl">
        </div>
        <div class="flex flex-col">
            <div class="flex items-center justify-between mb-7 gap-2 w-full h-min">
                <div>
                    @can('delete', $pin)
                        <a class="px-3 py-2 border-2 border-red-600 rounded-3xl font-semibold hover:bg-red-600 hover:text-white cursor-pointer transition-colors">
                            Delete pin
                        </a>
                    @endcan
                </div>
                <div class="flex gap-3">
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
                                        class="bg-black text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer">
                                    Saved
                                </button>
                            @else
                                <button type="button" id="save-btn"
                                        data-pin-id="{{ $pin->id }}"
                                        data-csrf="{{ csrf_token() }}"
                                        class="bg-red-600 text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer hover:bg-red-700">
                                    Save
                                </button>
                            @endif
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

@extends('layouts.app')

@section('page.title', $user->name."'s Profile")

@section('content')

    {{--    Profile info    --}}
    <div class="my-7 text-center">
        <div class="relative w-20 h-20 mx-auto">
            @if(empty($user->avatar))
                <img class="w-full h-full p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                     src="{{ asset('assets/default-avatar.png') }}" alt="Default avatar">
            @else
                <img class="w-full h-full p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                     src="{{ Storage::url('avatars/'.$user->avatar) }}" alt="Your avatar">
            @endif
        </div>

        <p class="my-4 font-semibold">{{ $user->name }}</p>

        <div class="text-gray-500 flex items-center justify-center">
            <p>
                {{ $user->subscribers()->count() }}
                Subscribers
            </p>
            @auth
                @can('subscribe', $user)
                    <span class="font-bold px-4">·</span>
                    @if($is_subscribed)
                        <button type="button" id="unsubscribe-btn"
                                data-author-id="{{ $user->id }}"
                                data-csrf="{{ csrf_token() }}"
                                class="bg-black text-white rounded-3xl font-semibold px-4 py-2">
                            Unsubscribe
                        </button>
                    @else
                        <button type="button" id="subscribe-btn"
                                data-author-id="{{ $user->id }}"
                                data-csrf="{{ csrf_token() }}"
                                class="border-[1px] border-gray-300 rounded-3xl hover:bg-gray-100 font-semibold px-4 py-2">
                            Subscribe
                        </button>
                    @endif
                @endcan
            @endauth
        </div>
    </div>

    {{--    Pins    --}}
    <div class="container mx-auto px-5 py-2 lg:px-14 lg:py-5">
        <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-6 gap-4">
            @foreach($user->pins as $pin)
                <div class="mb-4 relative group">
                    <a href="{{ route('pin', ['pin' => $pin]) }}">
                        <img
                            alt="Pin image"
                            class="w-full h-auto rounded-lg object-cover group-hover:scale-105 transition-transform cursor-zoom-in"
                            src="{{ Storage::url('pins/'.$pin->image) }}"/>
                    </a>

                    @auth
                        @can('save', $pin)
                            @if($saves->contains('pin_id', $pin->id))
                                <button type="button" disabled
                                        class="hidden group-hover:block absolute top-1 right-1 bg-black text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer">
                                    Saved
                                </button>
                            @else
                                <button type="button" id="save-btn-{{ $loop->iteration }}-{{ $pin->id }}"
                                        data-pin-id="{{ $pin->id }}"
                                        data-csrf="{{ csrf_token() }}"
                                        class="hidden group-hover:block absolute top-1 right-1 bg-red-600 text-white px-5 py-3 rounded-3xl font-extrabold cursor-pointer hover:bg-red-700">
                                    Save
                                </button>
                            @endif
                        @endcan
                    @endauth
                    <a href="{{ route('download_pin', ['pin' => $pin->image, 'name' => $pin->title]) }}"
                       title="Download pin"
                       class="hidden group-hover:block group absolute bottom-1 right-1 bg-white text-gray-800 px-2 py-2 rounded-3xl font-extrabold cursor-pointer hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @pushonce('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const saveButtons = document.querySelectorAll('[id^="save-btn-"]');

                saveButtons.forEach(button => {
                    button.onclick = function () {
                        const pinId = button.getAttribute('data-pin-id');
                        button.style.backgroundColor = '#000';
                        button.textContent = 'Saving...';

                        let xhr = new XMLHttpRequest();
                        xhr.open('POST', `/pins/${pinId}/save`, true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.setRequestHeader('X-CSRF-TOKEN', button.getAttribute('data-csrf'));
                        xhr.send();

                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                button.textContent = 'Saved';
                                button.disabled = true;
                            } else {
                                button.textContent = 'Failed';
                                button.style.backgroundColor = '#f44336';
                            }
                        };
                    };
                });

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
                            `/author/${button.getAttribute('data-author-id')}/subscribe`,
                            'unsubscribe-btn',
                            'Unsubscribe',
                            'Subscribing...',
                            ['bg-black', 'text-white'],
                            ['border-[1px]', 'border-gray-300', 'hover:bg-gray-100']
                        );
                    } else if (button.id === 'unsubscribe-btn') {
                        handleSubscription(
                            button,
                            `/author/${button.getAttribute('data-author-id')}/unsubscribe`,
                            'subscribe-btn',
                            'Subscribe',
                            'Unsubscribing...',
                            ['border-[1px]', 'border-gray-300', 'hover:bg-gray-100'],
                            ['bg-black', 'text-white']
                        );
                    }
                });
            });
        </script>
    @endpushonce
@endsection

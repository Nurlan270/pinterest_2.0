@extends('layouts.app')

@section('content')

    <x-auth-message/>

    <x-notification-message/>

    <div class="container mx-auto px-5 py-2 lg:px-14 lg:py-5">
        <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-6 gap-4">
            @foreach($pins as $pin)
                <div class="mb-4 relative group">
                    <a href="{{ route('pin', ['pin' => $pin]) }}">
                        <img
                            alt="Pin image"
                            class="w-full h-auto rounded-lg object-cover group-hover:scale-105 transition-transform cursor-zoom-in"
                            src="{{ Storage::url('pins/'.$pin->image) }}"/>
                    </a>

                    @auth
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
                        xhr.open('POST', `/pins/${pinId}/save-pin`, true);
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
            });
        </script>
    @endpushonce
@endsection

@extends('layouts.app')

@section('page.title', $pin->title)

@section('content')

    <div class="mx-auto shadow-2xl mt-5 mb-28 px-6 py-6 max-w-5xl rounded-3xl grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="rounded-3xl mx-auto my-auto">
            <img src="{{ Storage::url('pins/'.$pin->image) }}" alt="Pin image" class="rounded-3xl">
        </div>
        <div class="flex flex-col">
            <div class="flex items-center justify-end mb-7 gap-2 w-full h-min">
                <a href="{{ route('download_pin', ['pin' => $pin->image, 'name' => $pin->title]) }}"
                   title="Download pin"
                   class="bg-white text-gray-800 px-3 py-3 border-[1px] rounded-3xl font-extrabold cursor-pointer hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                    </svg>
                </a>
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
            </div>
            <div class="flex items-center justify-between mb-9">
                <div class="flex items-center gap-4">
                    <img class="w-14 h-14 rounded-full"
                         src="{{ !empty($pin->author->avatar) ? Storage::url('avatars/'.$pin->author->avatar) : asset('assets/default-avatar.png') }}"
                         alt="Profile picture">
                    <div class="font-medium dark:text-white">
                        <div>{{ $pin->author->name }}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $pin->author->subscribers }}
                            Subscribers
                        </div>
                    </div>
                </div>
                <button class="border-[1px] border-gray-300 rounded-3xl hover:bg-gray-100 font-semibold px-4 py-2">
                    Subscribe
                </button>
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
                let isRequestInProgress = false;

                function handleSave(btn, pinId, csrfToken) {
                    if (isRequestInProgress) return;

                    isRequestInProgress = true;
                    btn.style.backgroundColor = '#000';
                    btn.textContent = 'Saving...';

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', `/pins/${pinId}/save-pin`, true);
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
                    xhr.open('POST', `/pins/${pinId}/unsave-pin`, true);
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

                const saveBtn = document.getElementById('save-btn');
                const unsaveBtn = document.getElementById('unsave-btn');

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

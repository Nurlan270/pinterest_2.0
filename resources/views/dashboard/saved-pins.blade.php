@extends('layouts.app')

@section('page.title', 'Saved pins')

@section('content')

    <x-top-nav/>

    <x-notification-message/>

    <div class="container mx-auto px-5 py-2 lg:px-14 lg:pt-5">
        @if($saved_pins->isNotEmpty())
            <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-6 gap-4">
                @foreach($saved_pins as $pin)
                    <div class="mb-4 relative group">
                        <a href="{{ route('pin', ['pin' => $pin]) }}">
                            <img
                                alt="Pin image"
                                class="w-full h-auto rounded-lg object-cover group-hover:scale-105 transition-transform cursor-zoom-in"
                                src="{{ Storage::url('pins/'.$pin->image) }}"/>
                        </a>

                        <a href="{{ route('download_pin', ['pin' => $pin->image, 'name' => $pin->title]) }}"
                           title="Download pin"
                           class="hidden group-hover:block group absolute bottom-1 right-1 bg-white text-gray-800 px-2 py-2 rounded-3xl font-extrabold cursor-pointer hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center">
                <p>You don't have any saved pin.</p>
            </div>
        @endif
    </div>

@endsection

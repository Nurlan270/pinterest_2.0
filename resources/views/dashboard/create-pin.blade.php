@extends('layouts.app')

@section('page.title', 'Create new pin')

@section('content')

    <x-validation-errors-popup/>

    <form action="{{ route('upload_pin') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto mt-10 mb-28 px-3">
        @csrf
        <div class="mb-7">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span
                    class="text-red-600">*</span></label>
            <input type="text" id="base-input" placeholder="Space image in 4k" name="title" value="{{ old('title') }}"
                   required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-7">
            <label for="message"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="message" rows="4" name="description"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Astronomy is wonderful because...">{{ old('description') }}</textarea>
        </div>
        <div class="mb-7">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload image
                <span
                    class="text-red-600">*</span></label>
            <input name="image" required
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG (Max.
                25 MB)</p>
        </div>

        <button type="submit"
                class="flex items-center justify-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 w-full dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Upload
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-4 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5"/>
            </svg>
        </button>
    </form>

@endsection

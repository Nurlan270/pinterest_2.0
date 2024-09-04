<?php

if (! function_exists('active_if')) {
    function active_if(string $route): string
    {
        return \Illuminate\Support\Facades\Route::is($route)
            ? "bg-red-600 text-white"
            : "hover:bg-red-500 hover:text-white";
    }
}

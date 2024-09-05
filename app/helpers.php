<?php

if (! function_exists('bottom_on_if')) {
    function bottom_on_if(string $route): string
    {
        return \Illuminate\Support\Facades\Route::is($route)
            ? "text-red-600"
            : "group-hover:text-red-600";
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
Route::get('/', function () {
    return view('product/search');
});
Route::get('/counter', Counter::class);
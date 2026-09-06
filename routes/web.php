<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Employee;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', Employee::class)->name('employee');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

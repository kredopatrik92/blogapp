<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Blog\BlogIndex;
use App\Livewire\Pages\Blog\BlogAddEdit;
use App\Livewire\Pages\Blog\BlogDetails;
use App\Http\Controllers\ProfileController;
use Livewire\Volt\Volt;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('guest')->group(function () {
    Volt::route('/', 'pages.auth.login')
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('blog', BlogIndex::class)
        ->name('blog');

    Route::get('blog/add', BlogAddEdit::class)
        ->name('blog.add');

    Route::get('blog/edit/{post}', BlogAddEdit::class)
        ->name('blog.edit');

    Route::get('blog/{post}', BlogDetails::class)
        ->name('blog.details');

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BlogController;
use App\Livewire\Admin\PostManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blog.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/masjid-is-the-town-hall', function () {
    return view('blog.masjid-town-hall');
})->name('blog.masjid-town-hall');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

    
// });


// Route::get('/', [BlogController::class, 'index'])->name('blog.index');
// Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', PostManager::class)->name('dashboard');
// });
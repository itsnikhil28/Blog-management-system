<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'showpost'])->name('home');

// Route::view('/contact', 'contact')->name('contact');

// * `/posts` – View all posts
// * `/posts/create` – Create post form
// * `/posts/{id}/edit` – Edit post form
// * `/api/posts` – Public API (JSON output)

Route::resource('/posts', PostController::class);



require __DIR__ . '/auth.php';

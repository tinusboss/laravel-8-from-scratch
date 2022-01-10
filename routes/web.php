<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get ('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [\App\Http\Controllers\SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [\App\Http\Controllers\SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [\App\Http\Controllers\SessionsController::class, 'destroy'])->middleware('auth');



<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [TodoController::class, 'home'])->name('home');

Route::get('/about', [TodoController::class, 'about'])->name('about');

Route::get('/contact', [TodoController::class, 'contact'])->name('contact');

Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::post('/todo/{id}/progress', [TodoController::class, 'progress'])->name('todo.progress');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

// Registration
Route::get('/register', [TodoController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [TodoController::class, 'register']);

// Login
Route::get('/login', [TodoController::class, 'login'])->name('login');
Route::post('/login', [TodoController::class, 'doLogin']);

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');
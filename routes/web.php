<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\TaskController;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Todo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

// jika user belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// untuk user biasa dan admin
Route::prefix('todo')->name('user.todo.')->middleware(['auth'])->group(function () {
    Route::get('/', Todo::class)->name('home');
    Route::resource('/tasks', TaskController::class);
});

// untuk admin
Route::prefix('/dashboard/todo')->name('admin.todo.')->middleware(['auth', 'role:1'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
});

// untuk user yang sudah ter-autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/redirect', [RedirectController::class, 'check'])->name('redirect');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

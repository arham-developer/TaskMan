<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\{ForgotPassword, ResetPassword, SignUp, Login};
use App\Http\Livewire\{Dashboard, TaskList, TaskDetail, UnitList, UserList};

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/task-list', TaskList::class)->name('task-list');
    Route::get('/task/detail/{taskId}', TaskDetail::class)->name('task-detail');
    Route::get('/unit-list', UnitList::class)->name('unit-list');
    Route::get('/users', UserList::class)->name('users');
});


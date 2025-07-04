<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PositionController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('members/index', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');

    Route::get('positions/index', [PositionController::class, 'index'])->name('positions.index');
    Route::get('positions/create', [PositionController::class, 'create'])->name('positions.create');
    Route::get('positions/{position}/edit', [PositionController::class, 'edit'])->name('positions.edit');
});

require __DIR__.'/auth.php';

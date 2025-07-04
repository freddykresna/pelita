<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PositionController;
use App\Livewire\Member;
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

    Route::get('members', Member::class)->name('members.index');
    //    Route::get('positions', PositionController::class)->name('positions.index');
    //    Route::get('events', EventController::class)->name('events.index');
});

require __DIR__.'/auth.php';

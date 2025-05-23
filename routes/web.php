<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::resource('permintaan', PermintaanController::class);
    Route::put('permintaan/{permintaan}/selesai', [PermintaanController::class, 'selesai'])->name('permintaan.selesai');
});

require __DIR__.'/auth.php';

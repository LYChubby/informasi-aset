<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Models\Asset;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $latestAssets = Asset::latest()->take(5)->get();
    return view('dashboard', compact('latestAssets'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('assets', AssetController::class);
});


Route::resource('reports', ReportController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

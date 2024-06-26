<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\Language;

Route::get('language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return back();
})->name('change.language');

Route::middleware([Language::class])->group(function () {
Route::get('/', [AircraftController::class, 'index'])->name('aircraft.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('aircraft', AircraftController::class)->except(['index', 'show'])->middleware(IsAdmin::class);
Route::get('/aircraft/search', [AircraftController::class, 'search'])->name('aircraft.search');
Route::get('/aircraft/{aircraft}', [AircraftController::class, 'show'])->name('aircraft.show');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::resource('event', EventController::class)->except(['index', 'show'])->middleware(IsAdmin::class);
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware(IsAdmin::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;

Route::get('/', [AircraftController::class, 'index'])->name('aircraft.index');
Route::get('/aircraft', [AircraftController::class, 'index'])->name('aircraft.index');
Route::get('/aircraft/{aircraft}', [AircraftController::class, 'show'])->name('aircraft.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

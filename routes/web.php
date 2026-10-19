<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TrainingController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('country', CountryController::class);
Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');
Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');
Route::get('/training', [TrainingController::class, 'index'])->name('training.form');
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::resource('specialists', \App\Http\Controllers\SpecialistController::class);

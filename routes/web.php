<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TrainingController;
use App\Http\Middleware\TrackVisit;
use App\Http\Controllers\StatsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stats/detail', [App\Http\Controllers\StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::resource('country', CountryController::class);
Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');
Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');
Route::get('/training', [TrainingController::class, 'index'])->name('training.form');
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::get('/specialists/top', [SpecialistController::class, 'top'])->name('specialists.top');
Route::resource('specialists', SpecialistController::class);

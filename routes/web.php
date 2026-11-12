<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\SpecialistController;
use App\Http\Middleware\TrackVisit;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\SubscriptionController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('subscriptions', SubscriptionController::class);
Route::get('/blog/{blog}/tags', [BlogController::class, 'tags'])->name('blog.tags');
Route::post('/blog/{blog}/tags', [BlogController::class, 'tagsStore'])->name('blog.tags.store');
Route::resource('filters', FilterController::class)->except(['show']);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/blog/admin', [BlogController::class, 'admin'])->name('blog.admin');
Route::resource('blog', BlogController::class);
Route::get('/stats/detail', [App\Http\Controllers\StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::resource('country', CountryController::class);
Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');
Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');
//Route::get('/training', [TrainingController::class, 'index'])->name('training.form');
//Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::resource('training', TrainingController::class);
Route::get('/specialists/top', [SpecialistController::class, 'top'])->name('specialists.top');
Route::resource('specialists', SpecialistController::class);

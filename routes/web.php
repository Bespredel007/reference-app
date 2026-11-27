<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//  після входу
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
    Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
    // Профіль користувача
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Case 3
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/blog/admin', [BlogController::class, 'admin'])->name('blog.admin');
    Route::get('/blog/{blog}/tags', [BlogController::class, 'tags'])->name('blog.tags');
    Route::post('/blog/{blog}/tags', [BlogController::class, 'tagsStore'])->name('blog.tags.store');
    Route::resource('blog', BlogController::class)->except(['index', 'show']);
    Route::resource('filters', FilterController::class)->except(['show']);
    // керування абонементами
    Route::get('/subscriptions/admin', [SubscriptionController::class, 'admin'])->name('subscriptions.admin');
    Route::resource('subscriptions', SubscriptionController::class)->except(['index', 'show']);
    // керування спеціалістами
    Route::resource('specialists', SpecialistController::class)->except(['index', 'show']);
    // керування записами на тренування
    Route::resource('training', TrainingController::class)->except(['index', 'create', 'store']);
});
//доступні гостям
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
Route::get('/specialists/top', [SpecialistController::class, 'top'])->name('specialists.top');
Route::get('/specialists', [SpecialistController::class, 'index'])->name('specialists.index');
Route::get('/specialists/{specialist}', [SpecialistController::class, 'show'])->name('specialists.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/training/create', [TrainingController::class, 'create'])->name('training.create');
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::resource('country', CountryController::class);
Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');
Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::view('/about', 'site.about')->name('site.about');
Route::view('/contact', 'site.contact')->name('site.contact');
require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BadWordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\JobsAdminController;
use App\Http\Controllers\Website\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Website.jobs');
});

Route::group(['middleware' => 'guest:admin', 'prefix' => 'dashboard', 'as' => 'dashboard'], function () {
    Route::get('/login', [AuthController::class, 'view'])->name('.login');
    Route::post('/login',  [AuthController::class, 'login'])->name('.login.store');
});

Route::group(['middleware' => 'auth.admin', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('category', CategoryController::class)->names('category')->except(['destroy', 'show']);
    Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/chanageStatus', [CategoryController::class, 'changeStatus'])->name('category.changeStatus');

    Route::get('/jobs', [JobsAdminController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobsAdminController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/changeStatus', [JobsAdminController::class, 'changeStatus'])->name('jobs.changeStatus');


    Route::resource('users', UsersController::class)->names('user')->except(['destroy']);
    Route::get('/users/destroy/{user}', [UsersController::class, 'destroy'])->name('user.destroy');

    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    Route::resource('badWords', BadWordController::class)->names('badWord')->except(['destroy']);
    Route::get('/badWords/destroy/{badWord}', [BadWordController::class, 'destroy'])->name('badWord.destroy');
});




Route::group(['as' => 'website.'], function () {
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');
});

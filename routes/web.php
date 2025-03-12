<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BadWordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\JobsAdminController;
use App\Http\Controllers\Dashboard\WebInfoController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Website\HomePageController;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

////// home page
Route::get('/', [HomePageController::class, 'show'])->name('home.show');

// Route::get('/', function () {
//     return view('Website.jobs');
// });

Route::group(['middleware' => 'guest:admin', 'prefix' => 'dashboard', 'as' => 'dashboard'], function () {
    Route::get('/login', [AuthController::class, 'view'])->name('.login');
    Route::post('/login',  [AuthController::class, 'login'])->name('.login.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jobs', [JobsAdminController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobsAdminController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/changeStatus', [JobsAdminController::class, 'changeStatus'])->name('jobs.changeStatus');


    Route::resource('users', UsersController::class)->names('user')->except(['destroy']);
    Route::get('/users/destroy/{user}', [UsersController::class, 'destroy'])->name('user.destroy');

    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    Route::resource('badWords', BadWordController::class)->names('badWord')->except(['destroy']);
    Route::get('/badWords/destroy/{badWord}', [BadWordController::class, 'destroy'])->name('badWord.destroy');

    Route::get('/webInfo', [WebInfoController::class, 'index'])->name('webInfo.index');
    Route::get('/webInfo/edit', [WebInfoController::class, 'edit'])->name('webInfo.edit');
    Route::post('/webInfo/update', [WebInfoController::class, 'update'])->name('webInfo.update');
});




Route::group(['as' => 'website.'], function () {
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');
});

require __DIR__.'/auth.php';







/////////////////////////
use App\Http\Controllers\HadyProfileController;

Route::get('/hady-profile', [HadyProfileController::class, 'index'])->name('hady-profile');

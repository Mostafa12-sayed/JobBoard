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
use App\Http\Controllers\Website\JobController;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::paginate(5); 
    $jobCount = Job::count(); 
    return view('Website.jobs', compact('jobs', 'jobCount'));
});
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

    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

    // Route::middleware(['auth'])->group(function () {
    Route::get('/employer/create-job', [JobController::class, 'create'])->name('job.create');
    Route::post('/employer/store-job', [JobController::class, 'store'])->name('job.store');

    Route::get('/employer/manage-jobs', [JobController::class, 'manage'])->name('employer.jobs.index');
    Route::get('/employer/edit-job/{job}', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/employer/update-job/{job}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/employer/delete-job/{job}', [JobController::class, 'destroy'])->name('job.destroy');

    Route::post('/employer/job/{job}/accept/{application}', [JobController::class, 'acceptApplication'])->name('job.accept');
    Route::post('/employer/job/{job}/reject/{application}', [JobController::class, 'rejectApplication'])->name('job.reject');
    // });
});

require __DIR__.'/auth.php';







/////////////////////////
use App\Http\Controllers\HadyProfileController;

Route::get('/hady-profile', [HadyProfileController::class, 'index'])->name('hady-profile');

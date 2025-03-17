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
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\MyJobsController;
use App\Http\Middleware\AdminAuthenticate;
use App\Models\Job;

Route::get('/my-profile', [MyProfileController::class, 'index'])->middleware('auth')->name('my-profile');
Route::post('/profile/update-images', [MyProfileController::class, 'updateImages'])->middleware('auth')->name('profile.update.images');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Candidate profile update route
    Route::patch('/profile/candidate', [ProfileController::class, 'updateCandidate'])
        ->name('profile.update.candidate');
    // Employer profile update route
    Route::patch('/profile/employer', [ProfileController::class, 'updateEmployer'])
        ->name('profile.update.employer');
});





Route::get('/', function () {
    $jobs = Job::paginate(5);
    $jobCount = Job::count();
    return view('Website.jobs', compact('jobs', 'jobCount'));
});

////// home page
Route::get('/', [HomePageController::class, 'show'])->name('home.show');
Route::post('/filter', [HomePageController::class, 'show'])->name('home.filter');
Route::get('/my-app', [HomePageController::class, 'my_apps'])->name('home.my-apps');

// Route::get('/', function () {
//     return view('Website.jobs');
// });


Route::group(['middleware' => 'guest:admin', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/login', [AuthController::class, 'view'])->name('login');
    Route::post('/login',  [AuthController::class, 'login'])->name('login.store');
});

Route::group(['middleware' => AdminAuthenticate::class, 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
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

    Route::get('/webInfo', [WebInfoController::class, 'index'])->name('webInfo.index');
    Route::get('/webInfo/edit', [WebInfoController::class, 'edit'])->name('webInfo.edit');
    Route::post('/webInfo/update', [WebInfoController::class, 'update'])->name('webInfo.update');
});



Route::group(['as' => 'website.'], function () {
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
    Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/filtered', [JobController::class, 'filter'])->name('jobs.filter');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

    Route::middleware(['auth:web', 'check.user.type'])->group(function () {
        Route::get('/employer/create-job', [JobController::class, 'create'])->name('job.create');
        Route::post('/employer/store-job', [JobController::class, 'store'])->name('job.store');

        Route::get('/candidates', [HomePageController::class, 'candidates'])->name('candidates');
        Route::get('/my-jobs', [MyJobsController::class, 'index'])->name('MyJobs.index');

        Route::get('/employer/manage-jobs', [JobController::class, 'manage'])->name('employer.jobs.index');
        Route::get('/employer/edit-job/{job}', [JobController::class, 'edit'])->name('job.edit');
        Route::put('/employer/update-job/{job}', [JobController::class, 'update'])->name('job.update');
        Route::get('/employer/delete-job/{job}', [JobController::class, 'destroy'])->name('job.destroy');

        Route::post('/employer/job/{job}/accept/{application}', [JobController::class, 'acceptApplication'])->name('job.accept');
        Route::post('/employer/job/{job}/reject/{application}', [JobController::class, 'rejectApplication'])->name('job.reject');
    });
});

Route::get('/error', function () {
    return view('Website.abort');
})->name('error');
// Route::view('/{any}', 'Website.abort')->where('any', '.*');


Route::middleware('auth')->group(function () {
    Route::get('/comments/{jobId}', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
});
require __DIR__ . '/auth.php';

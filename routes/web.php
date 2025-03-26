<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\MyJobsController;
use App\Http\Controllers\Website\SocialController;
use App\Models\Job;

Route::middleware('check.verified.user')->group(function () {

    Route::get('/candidate/profile', [MyProfileController::class, 'canditateProfile'])->middleware('auth')->name('candidate.details');

    Route::post('/profile/update-images', [MyProfileController::class, 'updateImages'])->middleware('auth')->name('profile.update.images');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::middleware(['auth', 'check.verified.user'])->group(function () {
        Route::get('/my-profile', [MyProfileController::class, 'index'])->name('my-profile');
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
    })->name('home.index');
    Route::get('/', [HomePageController::class, 'show'])->name('home.show');
    // });


    ////// home page
    Route::post('/filter', [HomePageController::class, 'show'])->name('home.filter');
    Route::get('/my-app', [HomePageController::class, 'my_apps'])->name('home.my-apps');


    Route::group(['as' => 'website.'], function () {
        //contact us page
        Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
        Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

        //jobs page
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/jobs/filtered', [JobController::class, 'filter'])->name('jobs.filter');
        Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

        Route::get('/comments/{jobId}', [CommentController::class, 'index']);
        Route::middleware(['auth:web', 'verified'])->group(function () {

            //appply jobs
            Route::post('/jobs/apply/{id}', [JobController::class, 'apply'])->name('jobs.apply');
            Route::delete('/jobs/delete_app/{id}', [JobController::class, 'delete_app'])->name('jobs.delete_app');
            //comment jobs
            Route::post('/comments', [CommentController::class, 'store'])->middleware('filter.badwords');

            // create jon and manage    
            Route::middleware('check.user.type')->group(function () {
                Route::get('/employer/create-job', [JobController::class, 'create'])->name('job.create');
                Route::post('/employer/store-job', [JobController::class, 'store'])->name('job.store');
                Route::get('/candidates', [HomePageController::class, 'candidates'])->name('candidates');
                Route::get('/my-jobs', [MyJobsController::class, 'index'])->name('MyJobs.index');
                Route::get('/employer/manage-jobs', [JobController::class, 'manage'])->name('employer.jobs.index');
                Route::get('/employer/edit-job/{job}', [JobController::class, 'edit'])->name('job.edit');
                Route::put('/employer/update-job/{job}', [JobController::class, 'update'])->name('job.update');
                Route::get('/employer/delete-job/{job}', [JobController::class, 'destroy'])->name('job.destroy');
                // Route::post('/employer/job/{job}/accept/{application}', [JobController::class, 'acceptApplication'])->name('job.accept');
                // Route::post('/employer/job/{job}/reject/{application}', [JobController::class, 'rejectApplication'])->name('job.reject');
                Route::get('/employer/job/{jobId}/applications', [JobController::class, 'showApplications'])->name('job.applications');


                Route::get('/employer/job/{jobId}/accept/{applicationId}', [JobController::class, 'acceptApplication'])->name('job.accept');
                Route::get('/employer/job/{jobId}/reject/{applicationId}', [JobController::class, 'rejectApplication'])->name('job.reject');


                Route::get('/jobs/close/{job}', [MyJobsController::class, 'close'])->name('jobs.close');
            });
        });
    });

    // Route::get('/error', function () {
    //     return view('Website.abort');
    // })->name('error');
    // // Route::view('/{any}', 'Website.abort')->where('any', '.*');



    Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.login');
    Route::get('login/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');


    Route::get('password/forget/{token}', [PasswordResetLinkController::class, 'showLinkRequestForm'])
        ->name('password.forget.link');

    Route::post('password/email/submit', [PasswordResetLinkController::class, 'resetPassword'])
        ->name('password.forget.link.submit');
});

Route::get('/verifications/{id}/{token}', [RegisteredUserController::class, 'activateUser'])
    ->name('activate.user');

Route::post('/resend/verifications', [RegisteredUserController::class, 'resendVerificationEmail'])
    ->name('resend.verification.email');
Route::fallback(function () {
    return view('Website.abort');
})->name('error');
require __DIR__ . '/dashboard.php';
require __DIR__ . '/auth.php';

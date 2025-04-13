<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\ApplicationController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Employer side
Route::get('/employer', [EmployerController::class, 'index'])->name('employer.dashboard');

// Employer: View all applications
Route::get('/employer/applications', [ApplicationController::class, 'viewApplications'])->name('applications.index');

// Employer: View a specific application
Route::get('/employer/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');

// Job seeker side
Route::get('/jobseeker', [JobSeekerController::class, 'index'])->name('jobseeker.dashboard');

// Job routes (using resource route)
Route::resource('jobs', JobController::class);

// Job Seeker: List jobs and apply
Route::get('/job-seeker', [JobSeekerController::class, 'index'])->name('job_seeker.index');
Route::get('/job-seeker/jobs/{job}', [ApplicationController::class, 'applyForm'])->name('job_seeker.apply');
Route::post('/job-seeker/jobs/{job}', [ApplicationController::class, 'submitApplication'])->name('job_seeker.submit');

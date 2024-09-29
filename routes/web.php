<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppliedJobsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add_job', [JobsController::class, 'add_job_form'])->name('add_job_form');
    Route::post('/add_job', [JobsController::class, 'add_job'])->name('add_job');
    Route::get('/jobs/{id}/edit', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobsController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{id}', [JobsController::class, 'destroy'])->name('delete_job');
    Route::get('/job/{id}/applications', [JobsController::class, 'applicants'])->name('applications');
    Route::get('/apply-job/{id}',[JobsController::class, 'apply_job_form'])->name('apply_job_form');
    Route::post('/apply-job',[JobsController::class, 'apply_job'])->name('apply_job');
    Route::get('/all-applications', [JobsController::class, 'showAllApplications'])->name('all.applications');
});

Route::get('/jobs', [JobsController::class, 'job_list'])->name('jobs');
Route::get('/about', [JobsController::class, 'about'])->name('about');
Route::get('/contact', [JobsController::class, 'contact'])->name('contact');
Route::get('/jobs/{id}', [JobsController::class, 'single_job'])->name('show_job');
Route::get('/applicants', [JobsController::class, 'applicants'])->name('applicants');
Route::get('/company', [JobsController::class, 'company'])->name('company');
// Route::get('/applied-jobs', [AppliedJobsController::class, 'index'])->name('applied_jobs');
Route::get('/companies', [JobsController::class, 'showCompanies'])->name('companies');
 Route::get('/my-jobs', [JobsController::class, 'index'])->name('my_jobs');
// Route::delete('/applications/{id}', 'JobsController@deleteApplication')->name('delete.application');




require __DIR__.'/auth.php';

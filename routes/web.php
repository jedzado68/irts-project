<?php


use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('releases/index_regular', [ReleaseController::class, 'index_regular'])->name('release.index_regular');
Route::post('/releases/store', [ReleaseController::class, 'store'])->name('releases.store');
Route::get('/releases/{release}/edit', [ReleaseController::class, 'edit'])->name('releases.edit');
Route::put('/update/{release}', [ReleaseController::class, 'update'])->name('release.update');

Route::delete('/releases/{release}/destroy', [ReleaseController::class, 'destroy'])->name('releases.destroy');
Route::get('/releases/search', [ReleaseController::class, 'search'])->name('release.search');
Route::get('/releases/search', [ReleaseController::class, 'search2'])->name('release.search');


Route::get('releases/index_regular', [ReleaseController::class, 'index_regular'])->name('releases.index_regular');




Route::get('jobs/index_job_order', [JobController::class, 'index_job_order'])->name('job.index_job_order');
Route::post('jobs/store', [JobController::class, 'store'])->name('job.store');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}/destroy', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('jobs/index_job_order', [JobController::class, 'index_job_order'])->name('job.index_job_order');






Route::get('jobs/index_job_order', [JobController::class, 'index_job_order'])->name('jobs.index_job_order');
Route::get('/jobs/index_job_order', [JobController::class, 'index_job_order'])->name('job.index_job_order');

Route::put('/jobs/{job}/update', [JobController::class, 'update'])->name('job.update');
Route::get('jobs/index_job_order', [JobController::class, 'index_job_order'])->name('jobs.index_job_order');
Route::get('jobs/index_job_order', [JobController::class, 'index_job_order'])->name('job.index_job_order');


Route::get('users/registration', [UserController::class, 'registration'])->name('users.registration');
Route::post('users/store', [UserController::class, 'store'])->name('users.store');
Route::get('users/login', [UserController::class, 'login'])->name('users.login');
Route::post('users/login', [UserController::class, 'loginSubmit'])->name('login.submit');
Route::get('jobs/home', [UserController::class, 'home'])->name('jobs.home');


Route::get('logs/employee_logs', [LogController::class, 'employee_logs'])->name('logs.employee_logs');
Route::post('logs/employee_logs', [LogController::class, 'store'])->name('logs.store');
Route::get('logs/show', [LogController::class, 'showLogs'])->name('logs.show');

Route::get('/logs/employee-log', [LogController::class, 'employeeLog'])->name('logs.employee_log');
Route::get('/jobs/dashboard', [LogController::class, 'dashboard'])->name('jobs.dashboard');









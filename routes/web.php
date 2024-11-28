<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

//Route::get('/', function () {
//    return view('home');
//});
Route::view("/", "home");

// Route::get('/about', function () {
//     return "About page";
// });
//Route::get('/about', function () {
//    return view('about');
//});
Route::view("/about", "about");

//Route::get('/contacts', function () {
//    return view('contact');
//});
Route::view("/contact", "contact");

// Index
//Route::get('/jobs', function () {
//    $jobs = Job::with('employer')->latest()->paginate(5);
//
//    return view('jobs.index', ['jobs' => $jobs]);
//});
//Route::get('/jobs', [JobController::class, 'index']);

//Route::get('/jobs/{id}', [JobController::class, 'create']);
//Route::get('/jobs/{job}', [JobController::class, 'show']);
//Route::post('/jobs', [JobController::class, 'store']);
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//Route::patch('/jobs/{job}', [JobController::class, 'update']);
//Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//Route::controller(JobController::class)->group(function () {
//    Route::get('/jobs', 'index');
//    Route::get('/jobs/{id}','create');
//    Route::get('/jobs/{job}','show');
//    Route::post('/jobs','store');
//    Route::get('/jobs/{job}/edit','edit');
//    Route::patch('/jobs/{job}','update');
//    Route::delete('/jobs/{job}','destroy');
//});

Route::resource('jobs', JobController::class)->only(["index", "show"]);
Route::resource('jobs', JobController::class)->except(["index", "show", "edit"])->middleware('auth');
//Route::get('/jobs/{job}/edit', [JobController::class, "edit"])->middleware('auth', 'can:edit,job');
Route::get('/jobs/{job}/edit', [JobController::class, "edit"])
    ->middleware('auth')->can('update', 'job');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::get('/test', function () {
    return ['foo' => 'bar'];
});

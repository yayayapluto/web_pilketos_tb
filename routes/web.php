<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ViewController::class, "landing"])->name("landing");

//Publik kandidat
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidate.index');
Route::get('/candidates/{uuid}', [CandidateController::class, 'show'])->name('candidate.show');

//Public kandidat
Route::get("/voting", [ViewController::class, "showVotingForm"])->name("voting");
Route::post('/voting', [VotingController::class, 'store'])->name('voting.submit');

//Auth user dan kandidat
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'showDashboardPage'])->name('admin.dashboard');
    Route::get('/admin/monitor', [UserController::class, 'showMonitorPage'])->name('admin.monitor');
    Route::resource('/admin/candidates', CandidateController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(["guest"])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});
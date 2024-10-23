<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/countdown', function () {
    return view('countdown');
})->name("countdown");

Route::get('/deadline', function () {
    return view('deadline');
})->name("deadline");

Route::get("/", [ViewController::class, "landing"])->name("landing");
Route::get("/voting/{uuid}", [ViewController::class, "showCandidate"])->name("candidate");
Route::get("/voting", [ViewController::class, "showVotingForm"])->name("voting");

// Public candidate voting
Route::post('/voting', [VotingController::class, 'store'])->name('voting.submit');

// Authenticated user and candidate routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'showDashboardPage'])->name('admin.dashboard');
    Route::get('/admin/monitor', [UserController::class, 'showMonitorPage'])->name('admin.monitor');
    Route::resource('/admin/candidates', CandidateController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get("/admin/voting-time", [VotingController::class, "votingTimeForm"])->name("votingTime");
    Route::post("/admin/voting-time", [VotingController::class, "updateVotingTime"])->name("votingTime.update");
});

// Guest routes
Route::middleware(["guest"])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

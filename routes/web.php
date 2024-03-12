<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\RaceChallengeController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompetitorController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('admin/index', [AdminController::class, 'index']) ->name('admin.index');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::get('admin/races', [RaceController::class, 'index'])->name('race.index');
    Route::get('race/create', [RaceController::class, 'create'])->name('race.create');
    Route::get('race/edit/{race}', [RaceController::class, 'edit'])->name('race.edit');
    Route::put('race/update/{race}', [RaceController::class, 'update'])->name('race.update');
    Route::post('race/store', [RaceController::class, 'store'])->name('race.store');

    Route::get('admin/sponsors', [SponsorController::class, 'index'])->name('sponsor.index');
    Route::get('sponsor/create', [SponsorController::class, 'create'])->name('sponsor.create');
    Route::get('sponsor/edit/{sponsor}', [SponsorController::class, 'edit'])->name('sponsor.edit');
    Route::put('sponsor/update{sponsor}', [SponsorController::class, 'update'])->name('sponsor.update');
    Route::post('sponsor/store', [SponsorController::class, 'store'])->name('sponsor.store'); 

    Route::get('admin/insurances', [InsuranceController::class, 'index'])->name('insurance.index');
    Route::get('insurance/create', [InsuranceController::class, 'create'])->name('insurance.create');
    Route::get('insurance/edit/{insurance}', [InsuranceController::class, 'edit'])->name('insurance.edit');
    Route::put('insurance/update{insurance}', [InsuranceController::class, 'update'])->name('insurance.update');
    Route::post('insurance/store', [InsuranceController::class, 'store'])->name('insurance.store'); 

    Route::get('admin/challenges', [ChallengeController::class, 'index'])->name('challenge.index');
    Route::get('challenge/create', [ChallengeController::class, 'create'])->name('challenge.create');
    Route::get('challenge/edit/{challenge}', [ChallengeController::class, 'edit'])->name('challenge.edit');
    Route::put('challenge/update/{challenge}', [ChallengeController::class, 'update'])->name('challenge.update');
    Route::post('challenge/store', [ChallengeController::class, 'store'])->name('challenge.store');

    Route::get('admin/racechallenges/remove/{race}', [RaceChallengeController::class, 'index'])->name('racechallenge.index');
    Route::get('admin/racechallenges/add/{race}', [RaceChallengeController::class, 'indexadd'])->name('racechallenge.indexadd');
    Route::get('racechallenge/{race}/add/{challenge}', [RaceChallengeController::class, 'add'])->name('racechallenge.add');
    Route::get('racechallenge/{race}/remove/{challenge}', [RaceChallengeController::class, 'remove'])->name('racechallenge.remove');

    Route::get('admin/competitors', [CompetitorController::class, 'index'])->name('competitor.index');
    Route::get('competitor/create', [CompetitorController::class, 'create'])->name('competitor.create');
});
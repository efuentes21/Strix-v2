<?php

use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\InsuranceController;
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

Route::get('admin/races', [RaceController::class, 'index'])->name('race.index');
Route::get('race/create', [RaceController::class, 'create'])->name('race.create');
Route::post('race/store', [RaceController::class, 'store'])->name('race.store');

Route::get('admin/sponsors', [SponsorController::class, 'index'])->name('sponsor.index');
Route::get('sponsor/create', [SponsorController::class, 'create'])->name('sponsor.create');
Route::get('sponsor/edit/{sponsor}', [SponsorController::class, 'edit'])->name('sponsor.edit');
Route::put('sponsor/update', [SponsorController::class, 'update'])->name('sponsor.update');

Route::get('admin/insurances', [InsuranceController::class, 'index'])->name('insurance.index');
Route::get('insurance/create', [InsuranceController::class, 'create'])->name('insurance.create');

Route::get('admin/challenges', [ChallengeController::class, 'index'])->name('challenge.index');
Route::get('challenge/create', [ChallengeController::class, 'create'])->name('challenge.create');

Route::get('admin/competitors', [CompetitorController::class, 'index'])->name('competitor.index');
Route::get('competitor/create', [CompetitorController::class, 'create'])->name('competitor.create');

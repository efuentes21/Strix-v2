<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\RaceChallengeController;
use App\Http\Controllers\RaceInsuranceController;
use App\Http\Controllers\RaceImageController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\InscriptionController;
use App\Models\Inscription;
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

Route::get('/', [CompetitorController::class, 'mainpage'])->name('/');

Route::get('user/index', [CompetitorController::class, 'index']) ->name('user.index');
Route::post('user/login', [CompetitorController::class, 'login'])->name('user.login');
Route::get('races/inspection/{race}', [RaceController::class, 'inspection'])->name('race.inspection');
Route::get('races', [RaceController::class, 'racespage'])->name('races');
Route::get('inscription/create/{race}', [InscriptionController::class, 'create'])->name('inscription.index');
Route::post('inscription/store/{race}', [InscriptionController::class, 'store'])->name('inscription.store');
Route::get('media', [RaceImageController::class, 'media'])->name('media');
Route::get('media/race/{race}', [RaceImageController::class, 'mediashow'])->name('race.mediashow');
Route::get('challenges', [ChallengeController::class, 'challengespage'])->name('challenges');

Route::get('admin/index', [AdminController::class, 'index']) ->name('admin.index');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('user/register', [CompetitorController::class, 'create'])->name('user.register');
Route::post('user/new', [CompetitorController::class, 'store'])->name('user.new');

Route::get('pdf/qr/{race}/{competitor}/{number}', [InscriptionController::class, 'simple_qr'])->name('pdf.qr');
Route::get('/qr/save_time/{race}/{competitor}', [InscriptionController::class, 'save_time'])->name('qr.savetime');
Route::get('pdf/qr/all/{race}', [InscriptionController::class, 'all_qr'])->name('qr.all');

Route::get('rankings/{race}', [InscriptionController::class, 'print_rankings'])->name('print.ranking');
Route::get('rankings', [RaceController::class, 'rankings'])->name('rankings');

Route::group(['middleware' => 'auth.competitor'], function () {
    Route::get('user/logout', [CompetitorController::class, 'logout'])->name('user.logout');
    Route::get('inscription/storelogged/{race}', [InscriptionController::class, 'storelogged'])->name('inscription.logged');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::get('admin/races', [RaceController::class, 'index'])->name('race.index');
    Route::get('race/create', [RaceController::class, 'create'])->name('race.create');
    Route::get('race/edit/{race}', [RaceController::class, 'edit'])->name('race.edit');
    Route::put('race/update/{race}', [RaceController::class, 'update'])->name('race.update');
    Route::post('race/store', [RaceController::class, 'store'])->name('race.store');

    Route::get('race/inscriptions/{race}', [InscriptionController::class, 'print'])->name('inscription.print');
    Route::get('inscriptions/{race}', [InscriptionController::class, 'index'])->name('inscriptions');

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
    Route::post('racechallenge/update', [RaceChallengeController::class, 'update'])->name('racechallenge.update');

    Route::get('admin/sponsorship/remove/{race}', [SponsorshipController::class, 'index'])->name('sponsorship.index');
    Route::get('admin/sponsorship/add/{race}', [SponsorshipController::class, 'indexadd'])->name('sponsorship.indexadd');
    Route::get('sponsorship/{race}/add/{sponsor}', [SponsorshipController::class, 'add'])->name('sponsorship.add');
    Route::get('sponsorship/{race}/remove/{sponsor}', [SponsorshipController::class, 'remove'])->name('sponsorship.remove');

    Route::get('sponsors/sponsorships/{sponsor}', [SponsorshipController::class, 'print'])->name('sponsorship.print');

    Route::get('admin/raceinsurances/remove/{race}', [RaceInsuranceController::class, 'index'])->name('raceinsurance.index');
    Route::get('admin/raceinsurances/add/{race}', [RaceInsuranceController::class, 'indexadd'])->name('raceinsurance.indexadd');
    Route::get('raceinsurance/{race}/add/{insurance}', [RaceInsuranceController::class, 'add'])->name('raceinsurance.add');
    Route::get('raceinsurance/{race}/remove/{insurance}', [RaceInsuranceController::class, 'remove'])->name('raceinsurance.remove');

    Route::get('admin/raceimages/{race}', [RaceImageController::class, 'index'])->name('raceimages.index');
    Route::get('admin/raceimages/add/{race}', [RaceImageController::class, 'create'])->name('raceimages.add');
    Route::post('admin/raceimages/store/{race}', [RaceImageController::class, 'store'])->name('raceimages.store');

    Route::get('admin/competitors', [CompetitorController::class, 'adminindex'])->name('competitor.index');
    Route::get('competitor/create', [CompetitorController::class, 'create'])->name('competitor.create');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoccerController;
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


Route::get('/', [SoccerController::class, 'dashboardPage'])->name('dashboardPage');

Route::get('/generatefixture', [SoccerController::class, 'generateFixture'])->name('generateFixture');

Route::get('/playnextweek', [SoccerController::class, 'playNextWeek'])->name('playNextWeek');
Route::get('/playallweeks', [SoccerController::class, 'playAllWeeks'])->name('playAllWeeks');
Route::get('/resetresults', [SoccerController::class, 'resetResults'])->name('resetResults');
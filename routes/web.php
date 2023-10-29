<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\GirlsController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\VacanciesController;
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

Route::get('lang/{lang}', LanguageController::class)->name('lang.switch');

Route::get('/', MainController::class)->name('main.index');

Route::get('girls', [GirlsController::class, 'index'])->name('girls.index');
Route::get('programs', [ProgramsController::class, 'index'])->name('programs.index');
Route::get('interior', [InteriorController::class, 'index'])->name('interior.index');
Route::get('vacancies', [VacanciesController::class, 'index'])->name('vacancies.index');
Route::get('contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('news', [NewsController::class, 'index'])->name('news.index');

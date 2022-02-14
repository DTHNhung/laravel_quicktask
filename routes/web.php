<?php

use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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
Route::get('/lang/{locale}', [LanguagesController::class, 'switchLang'])->name('lang.switch');

Route::redirect('/', '/cars');

Route::resource('/cars', CarsController::class);

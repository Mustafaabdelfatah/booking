<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdmin;
use app\models\User;
use App\Models\Cities;
use App\Models\Busses;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::get('/', 'front\FrontController@index')->name('welcome');

Route::prefix('front')->group(function () {

    Route::get('login', 'front\FrontAuth@login')->name('front.login');
    Route::post('login', 'front\FrontAuth@dologin')->name('front.dologin');

    Route::get('register', 'front\FrontAuth@registerView')->name('front.register');
    Route::post('register', 'front\FrontAuth@register')->name('front.doregister');
});



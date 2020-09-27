<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/register', function () {
    return view('pages.register-v3');
});

Route::prefix('app')->group(function (){

    Route::get('/',function (){
        return view('pages.dashboard-v3');
    });

    Route::prefix('offer')->group(function () {

        Route::get('/', function () {
            return view('pages.offers');
        });

        Route::get('/{id}', 'App\Http\Controllers\OfferController@show');
    });
    Route::get('/login',function (){
        return view('pages.login-v1');
    });

    Route::get('/404',function (){
        return view('pages.landing.404');
    });
});

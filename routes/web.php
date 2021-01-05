<?php

use App\Mail\TestAmazonSes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::group(['prefix' => 'app', 'middleware' => ['auth']],function (){

    Route::get('/',function (){
        return redirect("/app/offer");
        #return view('pages.dashboard-v3');
    })->name("app");

    Route::get('/account',function (){
        return view('pages.my-account');
    })->name("account");

    Route::group(['prefix' => 'offer', 'middleware' => ['auth','verified']],function () {

        Route::get('/', function () {
            return view('pages.offers');
        })->name("offer.index");
        Route::post('/', 'App\Http\Controllers\OfferController@processForm')->name("offer.store");
        Route::get('/{category_id}/{id}/{fromDate}/{toDate}', 'App\Http\Controllers\OfferController@show')->middleware("plan.eligible")->name("offer.show");

    });

    Route::group(['prefix' => 'seller', 'middleware' => ['auth','verified']],function () {

        Route::get('/', function () {
            return view('pages.sellers');
        })->name("seller.index");
        Route::post('/', 'App\Http\Controllers\SellerController@processForm')->name("seller.store");
        Route::get('/{id}/{fromDate?}/{toDate?}/{categories}', 'App\Http\Controllers\SellerController@show')
            ->where('categories', '(.*)')
            ->middleware("plan.eligible")
            ->name("seller.show");

    });

    Route::group(['prefix' => 'category', 'middleware' => ['auth','verified']],function () {

        Route::get('/', function () {
            return view('pages.category-report');
        })->name("category.index");
        Route::post('/', 'App\Http\Controllers\CategoryController@processForm')->name("category.store");
        Route::get('/{fromDate}/{toDate}/{categories}', 'App\Http\Controllers\CategoryController@show')
            ->where('categories', '(.*)')
            ->middleware("plan.eligible")
            ->name("category.show");

    });

    Route::get('email/verify', function () {
        if(Auth::user()->email_verified_at == null)
            return view('auth.verify-new');
        else
            return redirect(\route("app"));
    })->middleware(['auth'])->name('verification.notice');


    Route::post('email/resend', function (Request $request) {
        if(Auth::user()->email_verified_at == null) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('status', 'verification-link-sent');
        }else{
            return redirect(\route("app"));
        }
    })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
});
Route::group(['prefix' => 'ajax', 'middleware' => ['auth']],function () {
    Route::group(['prefix' => 'category'],function () {
        Route::get('/', "App\Http\Controllers\AjaxCategoryController@index")->name("jstree");
        Route::post('/{category_id}', "App\Http\Controllers\AjaxCategoryController@show");
    });

});
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('forgot', 'App\Http\Controllers\Auth\ForgotPasswordController@showPasswordRecoveryForm')->name('forgot');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return view('auth.verify-success');
})->middleware(['auth', 'signed'])->name('verification.verify');


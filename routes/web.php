<?php

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

// Route::get('/c',"\Customer\Http\Controllers\BackEnd\CustomerController@index");
// Route::get('/',"\Seller\Http\Controllers\BackEnd\SellerController@index");

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            return view('welcome');
        });

        Route::get('test',function(){
            return View::make('test');
        });
        Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
        Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');

});



// Route::get('/', function () {
//     return view('welcome');
// });

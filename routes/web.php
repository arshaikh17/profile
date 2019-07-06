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
Auth::routes(["register" => false]);
//Route::get("/", function () { return view("layouts.profile"); });
//Route::get("/", "IndexController@index")->name("index");


Route::get('/home', 'HomeController@index')->name('home');

/**
 * Index Routes
 */
Route::group([
	"as"								 =>	"index."
], function() {
	
	/**
	 * IndexController Routes
	 */
	Route::get("/", "IndexController@index")->name("index");
	Route::get("/downloadCV/{cv}", "IndexController@downloadCV")->name("downloadCV");
	
});

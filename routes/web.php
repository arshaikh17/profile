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
Auth::routes();
Route::get("/", function () { return view("layouts.profile"); });
//Route::get("/", "IndexController@index")->name("index");


Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin Routes
 */
Route::group([
	"prefix"							 =>	"/admin",
	"as"								 =>	"admin."
], function () {
	
	/**
	 * Admin\AdminController Routes
	 */
	Route::get("/", "Admin\AdminController@index")->name("index");
	
	/**
	 * Admin\ProfileController Routes
	 */
	Route::group([
		"prefix"						 =>	"/profile",
		"as"							 =>	"profile."
	], function () {
		
		Route::get("/", "Admin\ProfileController@index")->name("index");
		Route::post("/{form}/update", "Admin\ProfileController@update")->name("updatePost");
		
	});
	
});
<?php
/**
 * This contains all the routes related to generals module.
 * 
 * Module Directory: /Http/Controllers/Generals
 */

/**
 * All Generals Routes
 */
Route::group([
	"prefix"							 =>	"/generals",
	"as"								 =>	"generals."
], function()
{
	
	/**
	 * App\Controllers\Generals\IndexController
	 */
	Route::get("/", "Generals\IndexController@index")->name("index");
	
	/**
	 * App\Controllers\Generals\PersonController
	 */
	Route::group([
		"prefix"						 =>	"/persons",
		"as"							 =>	"persons."
	], function()
	{
		
		Route::get("/", "Generals\PersonController@index")->name("index"); //No implemented.
		Route::post("/store", "Generals\PersonController@store")->name("store");
		Route::post("/{person}/update", "Generals\PersonController@update")->name("update");
		Route::post("/{person}/destroy", "Generals\PersonController@destroy")->name("destroy");
		
		Route::get("/public/history/{identity}/{pass}", "Generals\PersonController@publicHistory")->name("public.history");
		
	});
	
});
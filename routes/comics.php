<?php
/**
 * This contains all the routes related to comics module.
 * 
 * Module Directory: /Http/Controllers/Comics
 */

/**
 * All Comics Routes
 * 
 * /Comics
 * 
 */
Route::group([
	"prefix"							 =>	"/comics",
	"as"								 =>	"comics."
], function()
{
	
	/**
	 * Admin Routes
	 * 
	 * /Comics/Admin
	 * 
	 */
	Route::group([
		"prefix"						 =>	"/admin",
		"as"							 =>	"admin."
	], function()
	{
		
		/**
		 * /Comics/Admin/SeriesController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/series",
			"as"						 =>	"series."
		], function()
		{
			
			Route::get("/", "Comics\Admin\SeriesController@index")->name("index");
			Route::get("/create", "Comics\Admin\SeriesController@create")->name("create");
			Route::get("/{series}/edit", "Comics\Admin\SeriesController@edit")->name("edit");
			Route::post("/{series}/edit", "Comics\Admin\SeriesController@update")->name("update");
			Route::post("/", "Comics\Admin\SeriesController@store")->name("store");
			
		});
		
		/**
		 * /Comics/Admin/CharacterController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/characters",
			"as"						 =>	"characters."
		], function()
		{
			
			Route::get("/", "Comics\Admin\CharacterController@index")->name("index");
			Route::get("/show/{character}", "Comics\Admin\CharacterController@show")->name("show");
			Route::get("/create", "Comics\Admin\CharacterController@create")->name("create");
			Route::get("/{character}/edit", "Comics\Admin\CharacterController@edit")->name("edit");
			Route::post("/{character}/edit", "Comics\Admin\CharacterController@update")->name("update");
			Route::post("/", "Comics\Admin\CharacterController@store")->name("store");
			
		});
		
	});
	
});
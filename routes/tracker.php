<?php
/**
 * This contains all the routes related to tracker module.
 * 
 * Module Directory: /Http/Controllers/Tracker
 */

/**
 * All Tracker Routes
 */
Route::group([
	"prefix"							 =>	"/tracker",
	"as"								 =>	"tracker."
], function()
{
	
	/**
	 * Tracker/ModuleController Routes
	 */
	Route::group([
		"prefix"						 =>	"/modules",
		"as"							 =>	"modules."
	], function()
	{
		
		Route::get("/", "Tracker\ModuleController@index")->name("index");
		Route::get("/{module}", "Tracker\ModuleController@show")->name("show");
		Route::get("/create", "Tracker\ModuleController@create")->name("create");
		Route::post("/store", "Tracker\ModuleController@store")->name("store");
		Route::post("/{module}/update", "Tracker\ModuleController@update")->name("update");
		Route::post("/{module}/destroy", "Tracker\ModuleController@destroy")->name("destroy");
		
	});
	
});
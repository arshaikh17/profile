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
		
	});
	
});
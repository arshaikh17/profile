<?php
/**
 * This contains all the routes related to investments module.
 * 
 * Module Directory: /Http/Controllers/Investments
 */

/**
 * All Investments Routes
 */
Route::group([
	"prefix"							 =>	"/investments",
	"as"								 =>	"investments."
], function()
{
	
	/**
	 * Investments/IndexController Routes
	 */
	Route::get("/", "Investments\IndexController@index")->name("index");
	
	/**
	 * Investments/OrganisationController Routes
	 */
	Route::group([
		"prefix"						 =>	"/organisations",
		"as"							 =>	"organisations.",
	], function()
	{
		
		Route::get("/index", "Investments\OrganisationController@index")->name("index");
		Route::post("/store", "Investments\OrganisationController@store")->name("store");
		
	});
	
});
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
		
		Route::get("/", "Investments\OrganisationController@index")->name("index");
		Route::post("/store", "Investments\OrganisationController@store")->name("store");
		Route::post("/{organisation}", "Investments\OrganisationController@update")->name("update");
		Route::get("/{organisation}/show", "Investments\OrganisationController@show")->name("show");
		Route::get("/{organisation}/investments", "Investments\OrganisationController@investments")->name("investments");
		
		/**
		 * Investments/InvestmentController Routes
		 */
		Route::group([
			"prefix"					 =>	"/{organisation}/investments",
			"as"						 =>	"investments.",
		], function()
		{
			
			Route::post("/store", "Investments\InvestmentController@store")->name("store");
			Route::post("/{investment}", "Investments\InvestmentController@update")->name("update");
			Route::get("/{investment}/show", "Investments\InvestmentController@show")->name("show");
			
		});
		
	});
	
});
<?php
/**
 * This contains all the routes related to comics module.
 * 
 * Module Directory: /Http/Controllers/Wishlists
 */

/**
 * All Wishlists Routes
 */
Route::group([
	"prefix"							 =>	"/wishlists",
	"as"								 =>	"wishlists."
], function()
{
	
	/**
	 * Admin Routes
	 */
	Route::group([
		"prefix"						 =>	"/admin",
		"as"							 =>	"admin."
	], function()
	{
		
		/**
		 * /Wishlists/Admin/MarkOwnedController Route
		 */
		Route::group([
			"prefix"					 =>	"/mark-owned",
			"as"						 =>	"mark-owned."
		], function()
		{
			
			Route::post("/issue/{issue}", "Wishlists\Admin\MarkOwnedController@issue")->name("issue");
			
		});
		
		
	});
	
	/**
	 * /Wishlists/IndexController Route
	 */
	Route::get("/", "Wishlists\IndexController@index")->name("index");
	
});
<?php
/**
 * This contains all the routes related to collectibles module.
 * 
 * Module Directory: /Http/Controllers/Collectibles
 */

/**
 * All Collectibles Routes
 */
Route::group([
	"prefix"							 =>	"/collectibles",
	"as"								 =>	"collectibles."
], function()
{
	
	/**
	 * Collectibles/IndexController Routes
	 */
	Route::get("/", "Collectibles\IndexController@index")->name("index");
	
});


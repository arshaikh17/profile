<?php
/**
 * This contains all the routes related to articles module.
 * 
 * Module Directory: /Http/Controllers/Articles
 */

/**
 * All Articles Routes
 */
Route::group([
	"prefix"							 =>	"/articles",
	"as"								 =>	"articles."
], function()
{
	/**
	 * Articles/IndexController Routes
	 */
	Route::get("/my-friend-aitashan-babu-bhaiyya", "Articles\IndexController@dummy")->name("dummy");
	
});
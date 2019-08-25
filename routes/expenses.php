<?php
/**
 * This contains all the routes related to expenses module.
 * 
 * Module Directory: /Http/Controllers/Expenses
 */

/**
 * All Expenses Routes
 */
Route::group([
	"prefix"							 =>	"/expenses",
	"as"								 =>	"expenses."
], function() {
	
	/**
	 * App\Controllers\Expenses\IndexController
	 */
	Route::get("/", "Expenses\IndexController@index")->name("index");
	
	/**
	 * App\Controllers\Expenses\BudgetController
	 */
	Route::group([
		"prefix"						 =>	"/budgets",
		"as"							 =>	"budgets."
	], function() {
		
		Route::post("/store", "Expenses\BudgetController@store")->name("store");
		Route::post("/{budget}", "Expenses\BudgetController@update")->name("update");
		
	});
	
});
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
	
	/**
	 * App\Controllers\Expenses\ExpenditureController
	 */
	Route::group([
		"prefix"						 =>	"/expenditures",
		"as"							 =>	"expenditures."
	], function() {
		
		Route::post("/store", "Expenses\ExpenditureController@store")->name("store");
		Route::post("/{expenditure}", "Expenses\ExpenditureController@update")->name("update");
		Route::post("/{expenditure}/destroy", "Expenses\ExpenditureController@destroy")->name("destroy");
		
	});
	
	/**
	 * App\Controllers\Expenses\TagController
	 */
	Route::group([
		"prefix"						 =>	"/tags",
		"as"							 =>	"tags."
	], function() {
		
		Route::post("/store", "Expenses\TagController@store")->name("store");
		Route::post("/{tag}", "Expenses\TagController@update")->name("update");
		
	});
	
});
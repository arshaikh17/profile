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
	
	/**
	 * App\Controllers\Expenses\BillController
	 */
	Route::group([
		"prefix"						 =>	"/bills",
		"as"							 =>	"bills."
	], function() {
		
		Route::post("/store", "Expenses\BillController@store")->name("store");
		Route::post("/{bill}", "Expenses\BillController@update")->name("update");
		
	});
	
	/**
	 * App\Controllers\Expenses\GoalController (not implemented)
	 */
	Route::group([
		"prefix"						 =>	"/goals",
		"as"							 =>	"goals."
	], function() {
		
		/**
		 * App\Controllers\Expenses\GoalSavingController
		 */
		Route::group([
			"prefix"					 =>	"/savings",
			"as"						 =>	"savings."
		], function() {
			
			Route::post("/store", "Expenses\GoalSavingController@store")->name("store");
			Route::post("/{saving}", "Expenses\GoalSavingController@update")->name("update");
			Route::post("/{saving}/mark-active", "Expenses\GoalSavingController@markActive")->name("mark-active");
			Route::post("/{saving}/mark-inactive", "Expenses\GoalSavingController@markInactive")->name("mark-inactive");
			
		});
		
		/**
		 * App\Controllers\Expenses\GoalAllowanceController
		 */
		Route::group([
			"prefix"					 =>	"/allowances",
			"as"						 =>	"allowances."
		], function() {
			
			Route::post("/store", "Expenses\GoalAllowanceController@store")->name("store");
			Route::post("/{allowance}", "Expenses\GoalAllowanceController@update")->name("update");
			Route::post("/{allowance}/destroy", "Expenses\GoalAllowanceController@destroy")->name("destroy");
			Route::post("/{allowance}/mark-active", "Expenses\GoalAllowanceController@markActive")->name("mark-active");
			Route::post("/{allowance}/mark-inactive", "Expenses\GoalAllowanceController@markInactive")->name("mark-inactive");
			
		});
		
	});
	
	/**
	 * App\Controllers\Expenses\PaymentController (Not implemented)
	 */
	Route::group([
		"prefix"						 =>	"/payments",
		"as"							 =>	"payments."
	], function() {
		
		/**
		 * App\Controllers\Expenses\PaymentOweController
		 */
		Route::group([
			"prefix"					 =>	"/persons/{person}",
			"as"						 =>	"persons."
		], function() {
				
			Route::get("/history", "Expenses\PaymentOweController@history")->name("history");
			
			Route::group([
				"prefix"				 =>	"/owes",
				"as"					 =>	"owes."
			], function() {
				
				Route::post("/store", "Expenses\PaymentOweController@store")->name("store");
				Route::post("/{owe}", "Expenses\PaymentOweController@update")->name("update");
				Route::post("/{owe}/destroy", "Expenses\PaymentOweController@destroy")->name("destroy");
				Route::post("/{owe}/mark-paid", "Expenses\PaymentOweController@markPaid")->name("mark-paid");
				Route::post("/{owe}/mark-unpaid", "Expenses\PaymentOweController@markUnpaid")->name("mark-unpaid");
				
			});
			
		});
		
	});
	
});
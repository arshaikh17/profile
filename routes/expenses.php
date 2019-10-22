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
	Route::get("/{date?}", "Expenses\IndexController@index")->name("index");
	
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
	 * App\Controllers\Expenses\SavingController
	 */
	Route::group([
		"prefix"					 =>	"/savings",
		"as"						 =>	"savings."
	], function() {
		
		Route::post("/store", "Expenses\SavingController@store")->name("store");
		Route::post("/{saving}", "Expenses\SavingController@update")->name("update");
		Route::post("/{saving}/mark-active", "Expenses\SavingController@markActive")->name("mark-active");
		Route::post("/{saving}/mark-inactive", "Expenses\SavingController@markInactive")->name("mark-inactive");
		
	});
	
	/**
	 * App\Controllers\Expenses\AllowanceController
	 */
	Route::group([
		"prefix"					 =>	"/allowances",
		"as"						 =>	"allowances."
	], function() {
		
		Route::post("/store", "Expenses\AllowanceController@store")->name("store");
		Route::post("/{allowance}/destroy", "Expenses\AllowanceController@destroy")->name("destroy");
		Route::post("/{allowance}/mark-active", "Expenses\AllowanceController@markActive")->name("mark-active");
		Route::post("/{allowance}/mark-inactive", "Expenses\AllowanceController@markInactive")->name("mark-inactive");
		Route::post("/{allowance}", "Expenses\AllowanceController@update")->name("update");
		
	});
	
	/**
	 * App\Controllers\Expenses\Payment\IndexController (Not implemented)
	 */
	Route::group([
		"prefix"						 =>	"/payments",
		"as"							 =>	"payments."
	], function() {
		
		/**
		 * App\Controllers\Expenses\Payment\PersonController (Not implemented)
		 */
		Route::group([
			"prefix"					 =>	"/persons/{person}",
			"as"						 =>	"persons."
		], function() {
			
			/**
			 * App\Controllers\Expenses\Payments\DebtController
			 */
			Route::group([
				"prefix"				 =>	"/debts",
				"as"					 =>	"debts."
			], function() {
				
				Route::post("/store", "Expenses\Payments\DebtController@store")->name("store");
				Route::post("/{debt}", "Expenses\Payments\DebtController@update")->name("update");
				Route::post("/{debt}/destroy", "Expenses\Payments\DebtController@destroy")->name("destroy");
				Route::post("/{debt}/mark-paid", "Expenses\Payments\DebtController@markPaid")->name("mark-paid");
				Route::post("/{debt}/mark-unpaid", "Expenses\Payments\DebtController@markUnpaid")->name("mark-unpaid");
				
				Route::get("/history", "Expenses\Payments\DebtController@history")->name("history");
				
			});
			
			/**
			 * App\Controllers\Expenses\Payments\LoanController
			 */
			Route::group([
				"prefix"				 =>	"/loans",
				"as"					 =>	"loans."
			], function() {
				
				Route::post("/store", "Expenses\Payments\LoanController@store")->name("store");
				Route::post("/{loan}", "Expenses\Payments\LoanController@update")->name("update");
				Route::post("/{loan}/destroy", "Expenses\Payments\LoanController@destroy")->name("destroy");
				Route::post("/{loan}/mark-paid", "Expenses\Payments\LoanController@markPaid")->name("mark-paid");
				Route::post("/{loan}/mark-unpaid", "Expenses\Payments\LoanController@markUnpaid")->name("mark-unpaid");
				
				Route::get("/history", "Expenses\Payments\LoanController@history")->name("history");
				
			});
			
		});
		
	});
	
});
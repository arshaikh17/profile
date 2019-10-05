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
	
	Route::get("/", "Tracker\IndexController@index")->name("index");
	
	/**
	 * Tracker/ModuleController Routes
	 */
	Route::group([
		"prefix"						 =>	"/modules",
		"as"							 =>	"modules."
	], function()
	{
		
		Route::get("/", "Tracker\ModuleController@index")->name("index");
		Route::get("/{module}", "Tracker\ModuleController@show")->name("show");
		Route::get("/create", "Tracker\ModuleController@create")->name("create");
		Route::post("/store", "Tracker\ModuleController@store")->name("store");
		Route::post("/{module}/update", "Tracker\ModuleController@update")->name("update");
		Route::post("/{module}/destroy", "Tracker\ModuleController@destroy")->name("destroy");
		
		/**
		 * Tracker/ModuleIssueController
		 */
		Route::group([
			"prefix"					 =>	"/{module}/issues",
			"as"						 =>	"issues."
		], function() {
			
			Route::get("/", "Tracker\ModuleIssueController@index")->name("index");
			Route::get("/{issue}", "Tracker\ModuleIssueController@show")->name("show");
			Route::get("/{issue}/edit", "Tracker\ModuleIssueController@edit")->name("edit");
			Route::get("/create", "Tracker\ModuleIssueController@create")->name("create");
			Route::post("/store", "Tracker\ModuleIssueController@store")->name("store");
			Route::post("/{issue}", "Tracker\ModuleIssueController@update")->name("update");
			
		});
		
	});
	
	/**
	 * Tracker/IssueController Routes
	 */
	Route::group([
		"prefix"						 =>	"/issues",
		"as"							 =>	"issues."
	], function()
	{
		
		Route::get("/", "Tracker\IssueController@index")->name("index");
		
	});
	
});
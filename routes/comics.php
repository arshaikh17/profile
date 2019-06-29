<?php
/**
 * This contains all the routes related to comics module.
 * 
 * Module Directory: /Http/Controllers/Comics
 */

/**
 * All Comics Routes
 * 
 * /Comics
 * 
 */
Route::group([
	"prefix"							 =>	"/comics",
	"as"								 =>	"comics."
], function()
{
	
	/**
	 * Admin Routes
	 * 
	 * /Comics/Admin
	 * 
	 */
	Route::group([
		"prefix"						 =>	"/admin",
		"as"							 =>	"admin."
	], function()
	{
		
		/**
		 * /Comics/Admin/SeriesController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/series",
			"as"						 =>	"series."
		], function()
		{
			
			Route::get("/", "Comics\Admin\SeriesController@index")->name("index");
			Route::get("/show/{character}", "Comics\Admin\SeriesController@show")->name("show");
			Route::get("/create", "Comics\Admin\SeriesController@create")->name("create");
			Route::get("/{series}/edit", "Comics\Admin\SeriesController@edit")->name("edit");
			Route::post("/{series}/edit", "Comics\Admin\SeriesController@update")->name("update");
			Route::post("/", "Comics\Admin\SeriesController@store")->name("store");
			
		});
		
		/**
		 * /Comics/Admin/CharacterController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/characters",
			"as"						 =>	"characters."
		], function()
		{
			
			Route::get("/", "Comics\Admin\CharacterController@index")->name("index");
			Route::get("/show/{character}", "Comics\Admin\CharacterController@show")->name("show");
			Route::get("/create", "Comics\Admin\CharacterController@create")->name("create");
			Route::get("/{character}/edit", "Comics\Admin\CharacterController@edit")->name("edit");
			Route::post("/{character}/edit", "Comics\Admin\CharacterController@update")->name("update");
			Route::post("/", "Comics\Admin\CharacterController@store")->name("store");
			
		});
		
		/**
		 * /Comics/Admin/ArcController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/arcs",
			"as"						 =>	"arcs."
		], function()
		{
			
			Route::get("/", "Comics\Admin\ArcController@index")->name("index");
			Route::get("/show/{arc}", "Comics\Admin\ArcController@show")->name("show");
			Route::get("/create", "Comics\Admin\ArcController@create")->name("create");
			Route::get("/{arc}/edit", "Comics\Admin\ArcController@edit")->name("edit");
			Route::post("/{arc}/edit", "Comics\Admin\ArcController@update")->name("update");
			Route::post("/", "Comics\Admin\ArcController@store")->name("store");
			
		});
		
		/**
		 * /Comics/Admin/IssueController Routes
		 * 
		 */
		Route::group([
			"prefix"					 =>	"/issues",
			"as"						 =>	"issues."
		], function()
		{
			
			Route::get("/", "Comics\Admin\IssueController@index")->name("index");
			Route::get("/show/{issues}", "Comics\Admin\IssueController@show")->name("show");
			Route::get("/create/{selectedArc?}", "Comics\Admin\IssueController@create")->name("create");
			Route::get("/{issue}/edit", "Comics\Admin\IssueController@edit")->name("edit");
			Route::post("/{issue}/edit", "Comics\Admin\IssueController@update")->name("update");
			Route::post("/", "Comics\Admin\IssueController@store")->name("store");
			
		});
		
	});
	
});
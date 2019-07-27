<?php
/**
 * This contains all the routes related to comics module.
 * 
 * Module Directory: /Http/Controllers/Comics
 */

/**
 * All Comics Routes
 */
Route::group([
	"prefix"							 =>	"/comics",
	"as"								 =>	"comics."
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
		
		Route::get("/", "Comics\Admin\AdminController@index")->name("index");
		
		/**
		 * /Comics/Admin/SeriesController Routes
		 */
		Route::group([
			"prefix"					 =>	"/series",
			"as"						 =>	"series."
		], function()
		{
			
			Route::get("/", "Comics\Admin\SeriesController@index")->name("index");
			Route::get("/show/{series}", "Comics\Admin\SeriesController@show")->name("show");
			Route::get("/create", "Comics\Admin\SeriesController@create")->name("create");
			Route::get("/{series}/edit", "Comics\Admin\SeriesController@edit")->name("edit");
			Route::post("/{series}/edit", "Comics\Admin\SeriesController@update")->name("update");
			Route::post("/", "Comics\Admin\SeriesController@store")->name("store");
			Route::get("/search", "Comics\Admin\SeriesController@search")->name("search");
			
		});
		
		/**
		 * /Comics/Admin/AuthorController Routes
		 */
		Route::group([
			"prefix"					 =>	"/authors",
			"as"						 =>	"authors."
		], function()
		{
			
			Route::get("/", "Comics\Admin\AuthorController@index")->name("index");
			Route::get("/create", "Comics\Admin\AuthorController@create")->name("create");
			Route::get("/{author}/edit", "Comics\Admin\AuthorController@edit")->name("edit");
			Route::post("/{author}/edit", "Comics\Admin\AuthorController@update")->name("update");
			Route::post("/", "Comics\Admin\AuthorController@store")->name("store");
			Route::get("/search", "Comics\Admin\AuthorController@search")->name("search");
			
		});
		
		/**
		 * /Comics/Admin/IssueController Routes
		 */
		/*Route::group([
			"prefix"					 =>	"/issues",
			"as"						 =>	"issues."
		], function()
		{
			
			Route::get("/", "Comics\Admin\IssueController@index")->name("index");
			Route::get("/show/{issues}", "Comics\Admin\IssueController@show")->name("show");
			Route::get("/create", "Comics\Admin\IssueController@create")->name("create");
			Route::get("/create/{selectedSeries}/{selectedArc?}", "Comics\Admin\IssueController@createWithSeriesAndArc")->name("createWithSeriesAndArc");
			Route::get("/{issue}/edit", "Comics\Admin\IssueController@edit")->name("edit");
			Route::post("/{issue}/edit", "Comics\Admin\IssueController@update")->name("update");
			Route::post("/", "Comics\Admin\IssueController@store")->name("store");
			
		});*/
		
	});
	
	Route::get("/", "Comics\ComicsController@index")->name("index");
	
	/**
	 * Comics/AuthorController Routes
	 */
	Route::group([
		"prefix"						 =>	"/authors",
		"as"							 =>	"authors."
	], function()
	{
		Route::get("/{author}", "Comics\AuthorController@show")->name("show");
	});
	
	/**
		 * /Comics/ArcController Routes
		 */
	Route::group([
		"prefix"						 =>	"/arcs",
		"as"							 =>	"arcs."
	], function()
	{
		
		Route::get("/", "Comics\ArcController@index")->name("index");
		Route::get("/show/{arc}", "Comics\ArcController@show")->name("show");
		Route::get("/create/{series?}", "Comics\ArcController@create")->name("create");
		Route::get("/{arc}/edit", "Comics\ArcController@edit")->name("edit");
		Route::post("/{arc}/edit", "Comics\ArcController@update")->name("update");
		Route::post("/", "Comics\ArcController@store")->name("store");
		Route::get("/search", "Comics\ArcController@search")->name("search");
		
	});
	
	/**
	 * Comics/IssueController Routes
	 */
	Route::group([
		"prefix"						 =>	"/issues",
		"as"							 =>	"issues."
	], function()
	{
		Route::get("/", "Comics\IssueController@index")->name("index");
		Route::get("/show/{issues}", "Comics\IssueController@show")->name("show");
		Route::get("/create", "Comics\IssueController@create")->name("create");
		Route::get("/create/{selectedSeries}/{selectedArc?}", "Comics\IssueController@createWithSeriesAndArc")->name("createWithSeriesAndArc");
		Route::get("/{issue}", "Comics\IssueController@show")->name("show");
		Route::get("/{issue}/edit", "Comics\IssueController@edit")->name("edit");
		Route::post("/{issue}/edit", "Comics\IssueController@update")->name("update");
		Route::post("/", "Comics\IssueController@store")->name("store");
	});
	
	/**
	 * Comics/CharacterController Routes
	 */
	Route::group([
		"prefix"						 =>	"/characters",
		"as"							 =>	"characters."
	], function()
	{
		
		Route::group([
			"middleware"				 =>	"auth"
		], function() {
			
			Route::get("/create", "Comics\CharacterController@create")->name("create");
			Route::get("/{character}/edit", "Comics\CharacterController@edit")->name("edit");
			Route::post("/{character}/edit", "Comics\CharacterController@update")->name("update");
			Route::post("/", "Comics\CharacterController@store")->name("store");
			Route::get("/search", "Comics\CharacterController@search")->name("search");
		
		});
		
		Route::get("/", "Comics\CharacterController@index")->name("index");
		Route::get("/{character}", "Comics\CharacterController@show")->name("show");
		
	});
	
});
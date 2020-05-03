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
	
	
	Route::get("/", "Comics\ComicsController@index")->name("index");
	
	/**
	 * Comics/AuthorController Routes
	 */
	Route::group([
		"prefix"						 =>	"/authors",
		"as"							 =>	"authors."
	], function()
	{
		
		Route::get("/", "Comics\AuthorController@index")->name("index");
		Route::get("/create", "Comics\AuthorController@create")->name("create");
		Route::get("/{author}/edit", "Comics\AuthorController@edit")->name("edit");
		Route::post("/{author}/edit", "Comics\AuthorController@update")->name("update");
		Route::post("/", "Comics\AuthorController@store")->name("store");
		Route::get("/search", "Comics\AuthorController@search")->name("search");
		Route::get("/{author}", "Comics\AuthorController@show")->name("show");
		
	});
	
	/**
	 * /Comics/SeriesController Routes
	 */
	Route::group([
		"prefix"					 =>	"/series",
		"as"						 =>	"series."
	], function()
	{
		
		Route::get("/", "Comics\SeriesController@index")->name("index");
		Route::get("/show/{series}", "Comics\SeriesController@show")->name("show");
		Route::get("/create", "Comics\SeriesController@create")->name("create");
		Route::get("/{series}/edit", "Comics\SeriesController@edit")->name("edit");
		Route::post("/{series}/edit", "Comics\SeriesController@update")->name("update");
		Route::post("/", "Comics\SeriesController@store")->name("store");
		Route::get("/search", "Comics\SeriesController@search")->name("search");
		
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
	
	/**
	 * Comics/CollectibleController Routes
	 */
	Route::group([
		"prefix"							 =>	"/collectibles",
		"as"								 =>	"collectibles."
	], function()
	{
		
		Route::get("/", "Comics\CollectibleController@index")->name("index");
		Route::get("/list", "Comics\CollectibleController@list")->name("list");
		Route::get("/create", "Comics\CollectibleController@create")->name("create");
		Route::get("/{collectible}/edit", "Comics\CollectibleController@edit")->name("edit");
		Route::post("/", "Comics\CollectibleController@store")->name("store");
		Route::post("/{collectible}", "Comics\CollectibleController@update")->name("update");
		
	});
	
});
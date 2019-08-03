<?php
/**
 * This contains all the routes related to profile module.
 * 
 * Module Directory: /Http/Controllers/Profile
 */

/**
 * All Profile Routes
 */
Route::group([
	"prefix"							 =>	"/profile",
	"as"								 =>	"profile."
], function()
{
	
	/**
	 * Profile/ProfileController Routes
	 */
	Route::get("/", "Profile\ProfileController@index")->name("index");
	Route::post("/{form}/update", "Profile\ProfileController@update")->name("update");
	
	/**
	 * Profile/DetailController Routes
	 */
	Route::group([
		"prefix"					 =>	"/details",
		"as"						 =>	"details."
	], function()
	{
		
		Route::get("/", "Profile\DetailController@index")->name("index");
		Route::post("/", "Profile\DetailController@store")->name("store");
		
	});
	
	/**
	 * Profile/ExperienceController Routes
	 */
	Route::group([
		"prefix"					 =>	"/experiences",
		"as"						 =>	"experiences."
	], function()
	{
		
		Route::get("/", "Profile\ExperienceController@index")->name("index");
		Route::get("/create", "Profile\ExperienceController@create")->name("create");
		Route::get("/{experience}/edit", "Profile\ExperienceController@edit")->name("edit");
		Route::post("/{experience}/edit", "Profile\ExperienceController@update")->name("update");
		Route::post("/", "Profile\ExperienceController@store")->name("store");
		
	});
	
	/**
	 * Profile/EducationController Routes
	 */
	Route::group([
		"prefix"					 =>	"/educations",
		"as"						 =>	"educations."
	], function()
	{
		
		Route::get("/", "Profile\EducationController@index")->name("index");
		Route::get("/create", "Profile\EducationController@create")->name("create");
		Route::get("/{education}/edit", "Profile\EducationController@edit")->name("edit");
		Route::post("/{education}/edit", "Profile\EducationController@update")->name("update");
		Route::post("/", "Profile\EducationController@store")->name("store");
		
	});
	
	/**
	 * Profile/ProjectController Routes
	 */
	Route::group([
		"prefix"					 =>	"/projects",
		"as"						 =>	"projects."
	], function()
	{
		
		Route::get("/", "Profile\ProjectController@index")->name("index");
		Route::get("/create", "Profile\ProjectController@create")->name("create");
		Route::get("/{project}/edit", "Profile\ProjectController@edit")->name("edit");
		Route::post("/{project}/edit", "Profile\ProjectController@update")->name("update");
		Route::post("/", "Profile\ProjectController@store")->name("store");
		
	});
	
	/**
	 * Profile/CVController Routes
	 */
	Route::group([
		"prefix"					 =>	"/cvs",
		"as"						 =>	"cvs."
	], function()
	{
		
		Route::get("/", "Profile\CVController@index")->name("index");
		Route::get("/{cv}/edit", "Profile\CVController@edit")->name("edit");
		Route::post("/{cv}/edit", "Profile\CVController@update")->name("update");
		Route::post("/", "Profile\CVController@store")->name("store");
		Route::get("/{cv}/preview", "Profile\CVController@preview")->name("preview");
		
	});
	
});
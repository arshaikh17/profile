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
	 * Admin Routes
	 */
	Route::group([
		"prefix"						 =>	"/admin",
		"as"							 =>	"admin."
	], function()
	{
		
		/**
		 * Profile/Admin/AdminController Routes
		 */
		Route::get("/", "Profile\Admin\AdminController@index")->name("index");
		Route::get("/", "Profile\Admin\ProfileController@index")->name("index");
		Route::post("/{form}/update", "Profile\Admin\ProfileController@update")->name("update");
		
		/**
		 * Profile/Admin/DetailController Routes
		 */
		Route::group([
			"prefix"					 =>	"/details",
			"as"						 =>	"details."
		], function()
		{
			
			Route::get("/", "Profile\Admin\DetailController@index")->name("index");
			Route::post("/", "Profile\Admin\DetailController@store")->name("store");
			
		});
		
		/**
		 * Profile/Admin/ExperienceController Routes
		 */
		Route::group([
			"prefix"					 =>	"/experiences",
			"as"						 =>	"experiences."
		], function()
		{
			
			Route::get("/", "Profile\Admin\ExperienceController@index")->name("index");
			Route::get("/create", "Profile\Admin\ExperienceController@create")->name("create");
			Route::get("/{experience}/edit", "Profile\Admin\ExperienceController@edit")->name("edit");
			Route::post("/{experience}/edit", "Profile\Admin\ExperienceController@update")->name("update");
			Route::post("/", "Profile\Admin\ExperienceController@store")->name("store");
			
		});
		
		/**
		 * Profile/Admin/EducationController Routes
		 */
		Route::group([
			"prefix"					 =>	"/educations",
			"as"						 =>	"educations."
		], function()
		{
			
			Route::get("/", "Profile\Admin\EducationController@index")->name("index");
			Route::get("/create", "Profile\Admin\EducationController@create")->name("create");
			Route::get("/{education}/edit", "Profile\Admin\EducationController@edit")->name("edit");
			Route::post("/{education}/edit", "Profile\Admin\EducationController@update")->name("update");
			Route::post("/", "Profile\Admin\EducationController@store")->name("store");
			
		});
		
		/**
		 * Profile/Admin/ProjectController Routes
		 */
		Route::group([
			"prefix"					 =>	"/projects",
			"as"						 =>	"projects."
		], function()
		{
			
			Route::get("/", "Profile\Admin\ProjectController@index")->name("index");
			Route::get("/create", "Profile\Admin\ProjectController@create")->name("create");
			Route::get("/{project}/edit", "Profile\Admin\ProjectController@edit")->name("edit");
			Route::post("/{project}/edit", "Profile\Admin\ProjectController@update")->name("update");
			Route::post("/", "Profile\Admin\ProjectController@store")->name("store");
			
		});
		
		/**
		 * Profile/Admin/CVController Routes
		 */
		Route::group([
			"prefix"					 =>	"/cvs",
			"as"						 =>	"cvs."
		], function()
		{
			
			Route::get("/", "Profile\Admin\CVController@index")->name("index");
			Route::get("/{cv}/edit", "Profile\Admin\CVController@edit")->name("edit");
			Route::post("/{cv}/edit", "Profile\Admin\CVController@update")->name("update");
			Route::post("/", "Profile\Admin\CVController@store")->name("store");
			Route::get("/{cv}/preview", "Profile\Admin\CVController@preview")->name("preview");
			
		});
		
	});
	
});
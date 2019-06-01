<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//Route::get("/", function () { return view("layouts.profile"); });
//Route::get("/", "IndexController@index")->name("index");


Route::get('/home', 'HomeController@index')->name('home');

/**
 * Index Routes
 */
Route::group([
	"as"								 =>	"index."
], function() {
	
	/**
	 * IndexController Routes
	 */
	Route::get("/", "IndexController@index")->name("index");
	Route::get("/downloadCV/{cv}", "IndexController@downloadCV")->name("downloadCV");
	
});

/**
 * Admin Routes
 */
Route::group([
	"prefix"							 =>	"/admin",
	"as"								 =>	"admin."
], function()
{
	
	/**
	 * Admin\AdminController Routes
	 */
	Route::get("/", "Admin\AdminController@index")->name("index");
	
	/**
	 * Admin\ProfileController Routes
	 */
	Route::group([
		"prefix"						 =>	"/profile",
		"as"							 =>	"profile."
	], function()
	{
		
		Route::get("/", "Admin\ProfileController@index")->name("index");
		Route::post("/{form}/update", "Admin\ProfileController@update")->name("updatePost");
		
		/**
		 * Admin\Profile\ExperienceController Routes
		 */
		Route::group([
			"prefix"					 =>	"/experience",
			"as"						 =>	"experience."
		], function()
		{
			
			Route::get("/", "Admin\Profile\ExperienceController@index")->name("index");
			Route::get("/create", "Admin\Profile\ExperienceController@create")->name("create");
			Route::get("/{experience}/edit", "Admin\Profile\ExperienceController@edit")->name("edit");
			Route::post("/{experience}/edit", "Admin\Profile\ExperienceController@update")->name("editPost");
			Route::post("/", "Admin\Profile\ExperienceController@store")->name("store");
			
		});
		
		/**
		 * Admin\Profile\EducationController Routes
		 */
		Route::group([
			"prefix"					 =>	"/education",
			"as"						 =>	"education."
		], function()
		{
			
			Route::get("/", "Admin\Profile\EducationController@index")->name("index");
			Route::get("/create", "Admin\Profile\EducationController@create")->name("create");
			Route::get("/{education}/edit", "Admin\Profile\EducationController@edit")->name("edit");
			Route::post("/{education}/edit", "Admin\Profile\EducationController@update")->name("editPost");
			Route::post("/", "Admin\Profile\EducationController@store")->name("store");
			
		});
		
		/**
		 * Admin\Profile\ProjectController Routes
		 */
		Route::group([
			"prefix"					 =>	"/project",
			"as"						 =>	"project."
		], function()
		{
			
			Route::get("/", "Admin\Profile\ProjectController@index")->name("index");
			Route::get("/create", "Admin\Profile\ProjectController@create")->name("create");
			Route::get("/{project}/edit", "Admin\Profile\ProjectController@edit")->name("edit");
			Route::post("/{project}/edit", "Admin\Profile\ProjectController@update")->name("editPost");
			Route::post("/", "Admin\Profile\ProjectController@store")->name("store");
			
		});
		
		/**
		 * Admin\Profile\CVController Routes
		 */
		Route::group([
			"prefix"					 =>	"/cv",
			"as"						 =>	"cv."
		], function()
		{
			
			Route::get("/", "Admin\Profile\CVController@index")->name("index");
			Route::get("/{cv}/edit", "Admin\Profile\CVController@edit")->name("edit");
			Route::post("/{cv}/edit", "Admin\Profile\CVController@update")->name("editPost");
			Route::post("/", "Admin\Profile\CVController@store")->name("store");
			Route::get("/{cv}/preview", "Admin\Profile\CVController@preview")->name("preview");
			
		});
		
	});
	
});
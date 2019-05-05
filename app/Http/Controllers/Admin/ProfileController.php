<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AboutMe;
use App\SocialMedia;
use App\Email;

class ProfileController extends Controller {
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"admin.profile.";
	
	/**
	 * Constructor
	 */
	public function __construct () {
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index () {
		
		$socialTypes					 =	SocialMedia::getTypes();
		
		$about							 =	AboutMe::getAboutMe();
		$socialMedias					 =	SocialMedia::all();
		$emails							 =	Email::all();
		
		return view(self::VIEW_PATH . "index", compact("socialTypes", "socialMedias", "about", "emails"));
		
	}
	
	/**
	 * Updates profile values
	 * @param Illuminate\Http\Request $request
	 * @param String $form
	 */
	public function update (Request $request, $form) {
		
		switch ($form) {
			
			case "social":
				
				$this->updateSocialMediaFields($request);
				
				break;
			
			case "about":
				
				$this->updateAboutMe($request);
				
				break;
				
			case "email":
				
				$this->updateEmails($request);
				
				break;
				
			default:
				# code...
				break;
		}
		
		return redirect()->back()->with("status", "Profile updated.");
		
	}
	
	/**
	 * Processes social media fields
	 * @param Illuminate\Http\Request $request
	 */
	private function updateSocialMediaFields ($request) {
		
		$ids							 =	$request->ids ?: [];
		$urls							 =	$request->urls;
		$icons							 =	$request->icons;
		$type_ids						 =	$request->type_ids;
		$currentIds						 =	SocialMedia::getCurrentIDs();
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"url"					 =>	$urls[$key],
				"icon"					 =>	$icons[$key],
				"type_id"				 =>	$type_ids[$key]
			];
			
			SocialMedia::saveSocialMedia((object) $data);
			
		}
		
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			SocialMedia::removeSocialMedia(SocialMedia::find($id));
			
		}
		
	}
	
	/**
	 * Processes about me
	 * @param Illuminate\Http\Request $request
	 */
	private function updateAboutMe ($request) {
		
		AboutMe::saveAboutMe($request);
		
	}
	
	/**
	 * Processes email fields
	 * @param Illuminate\Http\Request $request
	 */
	private function updateEmails ($request) {
		
		$ids							 =	$request->ids ?: [];
		$titles							 =	$request->titles;
		$emails							 =	$request->emails;
		$is_primary_checks				 =	$request->is_primary_checks;
		$currentIds						 =	Email::getCurrentIDs();
		$primaryIndex					 =	array_search($request->is_primary, $is_primary_checks);
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"title"					 =>	$titles[$key],
				"email"					 =>	$emails[$key],
				"is_primary"			 =>	$key == $primaryIndex ? 1 : 0
			];
			
			Email::saveEmail((object) $data);
			
		}
		
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			Email::removeEmail(Email::find($id));
			
		}
		
	}
	
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SocialMedia;

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
		
		$socialMedias					 =	SocialMedia::all();
		
		return view(self::VIEW_PATH . "index", compact("socialTypes", "socialMedias"));
		
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
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"url"					 =>	$urls[$key],
				"icon"					 =>	$icons[$key],
				"type_id"				 =>	$type_ids[$key]
			];
			
			SocialMedia::saveSocialMedia((object) $data);
			
		}
		
		$currentIds						 =	SocialMedia::getCurrentIDs();
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			SocialMedia::removeSocialMedia(SocialMedia::find($id));
			
		}
		
	}
	
}

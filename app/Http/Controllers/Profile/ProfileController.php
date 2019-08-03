<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Detail;
use App\Models\Profile\SocialMedia;
use App\Models\Profile\Email;
use App\Models\Profile\Phone;
use App\Models\Profile\Address;
use App\Models\Profile\Skill;
use App\Models\Profile\Experience;

class ProfileController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.";
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$socialTypes					 =	SocialMedia::getTypes();
		$skillCategories				 =	Skill::getCategories();
		$skillLevels					 =	Skill::getLevels();
		
		$details						 =	Detail::all();
		$socialMedias					 =	SocialMedia::all();
		$emails							 =	Email::all();
		$phones							 =	Phone::all();
		$addresses						 =	Address::all();
		$skills							 =	Skill::all();
		
		return view(self::VIEW_PATH . "index", compact("socialTypes", "socialMedias", "emails", "phones", "addresses", "skills", "skillCategories", "skillLevels"));
		
	}
	
	/**
	 * Updates profile values
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param String $form
	 */
	public function update(Request $request, $form)
	{
		
		switch ($form) {
			
			case "social":
				
				$this->updateSocialMediaFields($request);
				
				break;
			
			case "email":
				
				$this->updateEmails($request);
				
				break;
			
			case "phone":
				
				$this->updatePhones($request);
				
				break;
				
			case "address":
				
				$this->updateAddresses($request);
				
				break;
				
			case "skill":
				
				$this->updateSkills($request);
				
				break;
				
			default:
				# code...
				break;
		}
		
		return redirect()->back()->with("status", "Profile updated.");
		
	}
	
	/**
	 * Processes social media fields
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	private function updateSocialMediaFields($request)
	{
		
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
	 * Processes email fields
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	private function updateEmails($request)
	{
		
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
	
	/**
	 * Processes phone fields
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	private function updatePhones($request)
	{
		
		$ids							 =	$request->ids ?: [];
		$titles							 =	$request->titles;
		$phones							 =	$request->phones;
		$is_primary_checks				 =	$request->is_primary_checks;
		$currentIds						 =	Phone::getCurrentIDs();
		$primaryIndex					 =	array_search($request->is_primary, $is_primary_checks);
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"title"					 =>	$titles[$key],
				"phone"					 =>	$phones[$key],
				"is_primary"			 =>	$key == $primaryIndex ? 1 : 0
			];
			
			Phone::savePhone((object) $data);
			
		}
		
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			Phone::removePhone(Phone::find($id));
			
		}
		
	}
	
	/**
	 * Processes address fields
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	private function updateAddresses($request)
	{
		
		$ids							 =	$request->ids ?: [];
		$titles							 =	$request->titles;
		$addresses						 =	$request->addresses;
		$cities							 =	$request->cities;
		$states							 =	$request->states;
		$countries						 =	$request->countries;
		$postcodes						 =	$request->postcodes;
		$is_primary_checks				 =	$request->is_primary_checks;
		$currentIds						 =	Address::getCurrentIDs();
		$primaryIndex					 =	array_search($request->is_primary, $is_primary_checks);
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"title"					 =>	$titles[$key],
				"address"				 =>	$addresses[$key],
				"city"					 =>	$cities[$key],
				"state"					 =>	$states[$key],
				"country"				 =>	$countries[$key],
				"postcode"				 =>	$postcodes[$key],
				"is_primary"			 =>	$key == $primaryIndex ? 1 : 0
			];
			
			Address::saveAddress((object) $data);
			
		}
		
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			Address::removeAddress(Address::find($id));
			
		}
		
	}
	
	/**
	 * Processes skill fields
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	private function updateSkills($request)
	{
		
		$ids							 =	$request->ids ?: [];
		$titles							 =	$request->titles;
		$experiences					 =	$request->experiences;
		$experience_level_ids			 =	$request->experience_level_ids;
		$skill_category_ids				 =	$request->skill_category_ids;
		
		$currentIds						 =	Skill::getCurrentIDs();
		
		foreach ($ids as $key => $id) {
			
			$data						 =	[
				"id"					 =>	$id,
				"title"					 =>	$titles[$key],
				"experience"			 =>	$experiences[$key],
				"experience_level_id"	 =>	$experience_level_ids[$key],
				"skill_category_id"		 =>	$skill_category_ids[$key]
			];
			
			Skill::saveSkill((object) $data);
			
		}
		
		$differenceIds					 =	array_diff($currentIds, $ids) ?: [];
		
		foreach ($differenceIds as $id) {
			
			Skill::removeSkill(Skill::find($id));
			
		}
		
	}
	
}

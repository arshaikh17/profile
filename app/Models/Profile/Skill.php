<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;

use App\Traits\ProfileTrait;

class Skill extends AbstractModel
{
	
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"experience",
		"experience_level_id",
		"skill_category_id"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"experience_name",
		"caregory_name"
	];
	
	/**
	 * Constants
	 */
	CONST CATEGORY_MAJOR				 =	1;
	CONST CATEGORY_FRAMEWORK			 =	2;
	CONST CATEGORY_FRONTEND				 =	3;
	CONST CATEGORY_SOURCE_CONTROL		 =	4;
	CONST CATEGORY_PROFESSIONAL			 =	5;
	
	CONST LEVEL_BEGINNER				 =	1;
	CONST LEVEL_INTERMEDIATE			 =	2;
	CONST LEVEL_EXPERIENCED				 =	3;
	CONST LEVEL_EXPERT					 =	4;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns Skill categories
	 * 
	 * @return array $categories[]
	 */
	public static function getCategories()
	{
		
		return [
			self::CATEGORY_MAJOR							 =>	"Major",
			self::CATEGORY_FRAMEWORK						 =>	"Framework",
			self::CATEGORY_FRONTEND							 =>	"Frontend",
			self::CATEGORY_SOURCE_CONTROL					 =>	"Source Control",
			self::CATEGORY_PROFESSIONAL						 =>	"Professional Tool"
		];
		
	}
	
	/**
	 * Returns Skill experience levels
	 * 
	 * @return array $levels[]
	 */
	public static function getLevels()
	{
		
		return [
			self::LEVEL_BEGINNER		 =>	"Beginner",
			self::LEVEL_INTERMEDIATE	 =>	"Intermediate",
			self::LEVEL_EXPERIENCED		 =>	"Experienced",
			self::LEVEL_EXPERT			 =>	"Expert",
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param json $data[]
	 */
	public static function saveSkill($data)
	{
		
		Skill::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"experience"				 =>	$data->experience,
			"experience_level_id"		 =>	$data->experience_level_id,
			"skill_category_id"			 =>	$data->skill_category_id
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Skill $skill
	 */
	public static function removeSkill(Skill $skill)
	{
		
		$skill->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Skill::all());
		
	}
	
	/**
	 * Returns all skills categorised
	 * 
	 * @return App\Models\Profile\Skill $skills[]
	 */
	public static function getSkills()
	{
		
		$skills							 =	[];
		
		foreach (self::getCategories() as $categoryKey => $categories) {
			
			$skills[$categories]		 =	Skill::where("skill_category_id", "=", $categoryKey)->get();
			
		}
		
		return $skills;
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/**
	 * Returns experience
	 * 
	 * @return String $experience
	 */
	public function getExperienceNameAttribute()
	{
		
		return self::getLevels()[$this->experience_level_id] ?? "";
		
	}
	
	/**
	 * Returns category
	 * 
	 * @return String $category
	 */
	public function getCategoryNameAttribute()
	{
		
		return self::getCategories()[$this->skill_category_id] ?? "";
		
	}
	
}

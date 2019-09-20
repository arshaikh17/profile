<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;
use App\Models\Profile\SkillTag;

use App\Traits\ProfileTrait;

class Experience extends AbstractModel
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"company",
		"title",
		"description",
		"responsibilities",
		"city",
		"country",
		"start_date",
		"end_date",
		"is_active",
		"job_type_id",
		"company_logo"
	];
	
	/**
	 * Casts
	 */
	protected $casts					 =	[
		"responsibilities"				 =>	"array"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"job_type",
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_PERMANENT				 =	1;
	CONST TYPE_CONTRACT					 =	2;
	CONST TYPE_INTERNSHIP				 =	3;
	
	/**
	 * Scoped variables
	 */
	private static $path_logo			 =	"/uploads/profile/companies/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns Experience types
	 * 
	 * @return array $types[]
	 */
	public static function getTypes()
	{
		
		return [
			self::TYPE_PERMANENT		 =>	"Permanent",
			self::TYPE_CONTRACT			 =>	"Contract",
			self::TYPE_INTERNSHIP		 =>	"Internship"
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Profile\Experience $experience
	 * @param Array $data
	 */
	public static function saveExperience(Experience $experience, $data)
	{
		
		$company_logo					 =	$experience->company_logo;
		$file							 =	$data["company_logo"] ?? false;
		
		if ($file) {
			
			//if (file_exists(public_path() . self::$path_logo . $experience->company_logo)) var_dump(unlink(public_path() . self::$path_logo . "$experience->company_logo"));
			
			$company_logo				 =	time() . "." . $file->getClientOriginalName();
			
			$file->move(public_path() . self::$path_logo, $company_logo);
			
		}
		
		$experience						 =	Experience::updateOrCreate([
			"id"						 =>	$experience->id
		], [
			"company"					 =>	$data["company"],
			"title"						 =>	$data["title"],
			"description"				 =>	$data["description"],
			"responsibilities"			 =>	$data["responsibilities"],
			"city"						 =>	$data["city"],
			"country"					 =>	$data["country"],
			"start_date"				 =>	$data["start_date"],
			"end_date"					 =>	$data["end_date"],
			"is_active"					 =>	$data["is_active"] ?? 0,
			"company_logo"				 =>	$company_logo,
			"job_type_id"				 =>	$data["job_type_id"]
		]);
		
		$skillTags						 =	SkillTag::getCurrentIDs(SkillTag::ENTITY_EXPERIENCE, $experience->id);
		$newSkillTags					 =	$data["existing_skill_tags"] ?? [];
		
		$skillTagsDifference			 =	array_diff($skillTags, $newSkillTags);
		
		foreach ($skillTagsDifference as $skillTagDifferenceId) {
			
			SkillTag::removeSkillTag(SkillTag::find($skillTagDifferenceId));
			
		}
		
		foreach ($data["skill_tags"] as $tag) {
			
			SkillTag::saveSkillTag([
				"skill_id"				 =>	$tag,
				"entity_type_id"		 =>	SkillTag::ENTITY_EXPERIENCE,
				"entity_id"				 =>	$experience->id
			]);
			
		}
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Experience $experience
	 */
	public static function removeExperience(Experience $experience)
	{
		
		$experience->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getCurrentIDs(Experience::all());
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Returns job type
	 * 
	 * @return String $jobType
	 */
	public function getJobTypeAttribute()
	{
		
		return self::getTypes()[$this->job_type_id] ?? "";
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skills associated to a experience
	 * 
	 * @return App\Models\Profile\SkillTag $skillTags[]
	 */
	public function skill_tags()
	{
		
		return $this->hasMany(SkillTag::class, "entity_id", "id")
			->where("entity_type_id", SkillTag::ENTITY_EXPERIENCE)
		;
		
	}
	
}

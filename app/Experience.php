<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\SkillTag;

class Experience extends Model
{
	
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
	 * Constants
	 */
	CONST TYPE_PERMANENT				 =	1;
	CONST TYPE_CONTRACT					 =	2;
	CONST TYPE_INTERNSHIP				 =	3;
	
	/**
	 * Variable for scope
	 */
	private static $path_logo			 =	"/uploads/company/";
	
	/**
	 * Returns Experience types
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
	 * Updates experience
	 * @param App\Experience $experience
	 * @param json $data[]
	 */
	public static function saveExperience(Experience $experience, $data)
	{
		
		$company_logo					 =	$experience->company_logo;
		
		if ($data->hasFile("company_logo")) {
			
			$file						 =	$data->file("company_logo");
			
			//if (file_exists(public_path() . self::$path_logo . $experience->company_logo)) var_dump(unlink(public_path() . self::$path_logo . "$experience->company_logo"));
			
			$company_logo				 =	time() . "." . $file->getClientOriginalName();
			
			$file->move(public_path() . self::$path_logo, $company_logo);
			
		}
		
		$experience						 =	Experience::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"company"					 =>	$data->company,
			"title"						 =>	$data->title,
			"description"				 =>	$data->description,
			"responsibilities"			 =>	$data->responsibilities,
			"city"						 =>	$data->city,
			"country"					 =>	$data->country,
			"start_date"				 =>	$data->start_date,
			"end_date"					 =>	$data->end_date,
			"is_active"					 =>	$data->is_active ?: 0,
			"company_logo"				 =>	$company_logo,
			"job_type_id"				 =>	$data->job_type_id
		]);
		
		$skillTags						 =	SkillTag::getCurrentIDs(SkillTag::ENTITY_EXPERIENCE, $experience->id);
		$newSkillTags					 =	$data->existing_skill_tags;
		
		$skillTagsDifference			 =	array_diff($skillTags, $newSkillTags);
		
		foreach ($skillTagsDifference as $skillTagDifferenceId) {
			
			SkillTag::removeSkillTag(SkillTag::find($skillTagDifferenceId));
			
		}
		
		foreach ($data->skill_tags as $tag) {
			
			SkillTag::saveSkillTag([
				"skill_id"				 =>	$tag,
				"entity_type_id"		 =>	SkillTag::ENTITY_EXPERIENCE,
				"entity_id"				 =>	$experience->id
			]);
			
		}
		
	}
	
	/**
	 * Removes Experience
	 * @param App\Experience $experience
	 */
	public static function removeExperience(Experience $experience)
	{
		
		$experience->delete();
		
	}
	
	/**
	 * Returns current Experience ids
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		$ids							 =	[];
		
		foreach (Experience::all() as $experience) {
			
			$ids[]						 =	$experience->id;
			
		}
		
		return $ids;
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skills associated to a experience
	 * @return Array $skilltags[]
	 */
	public function skill_tags()
	{
		
		return $this->hasMany(SkillTag::class, "entity_id", "id")
			->where("entity_type_id", SkillTag::ENTITY_EXPERIENCE)
		;
		
	}
	
}

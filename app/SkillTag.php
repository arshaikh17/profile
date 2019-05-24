<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Skill;

class SkillTag extends Model {
	
	/**
	 * Table name
	 */
	protected $table					 =	"skill_tags";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"entity_type_id",
		"entity_id",
		"skill_id"
	];
	
	/**
	 * Constants
	 */
	CONST ENTITY_EXPERIENCE				 =	1;
	CONST ENTITY_PROJECT				 =	2;
	
	/**
	 * Creates or updates skill tag
	 * @param Array $data
	 */
	public static function saveSkillTag(Array $data)
	{
		
		SkillTag::updateOrCreate([
			"entity_type_id"			 =>	$data["entity_type_id"],
			"entity_id"					 =>	$data["entity_id"],
			"skill_id"					 =>	$data["skill_id"]
		], [
			"entity_type_id"			 =>	$data["entity_type_id"],
			"entity_id"					 =>	$data["entity_id"],
			"skill_id"					 =>	$data["skill_id"]
		]);
		
	}
	
	/**
	 * Removes SkillTag
	 * @param App\SkillTag $skillTag
	 */
	public static function removeSkillTag(SkillTag $skillTag)
	{
		
		$skillTag->delete();
		
	}
	
	/**
	 * Returns current Experience ids
	 * @param Integer $entityType
	 * @param Integer $entityId
	 * @return array $ids
	 */
	public static function getCurrentIDs($entityType, $entityId)
	{
		
		$ids							 =	[];
		
		$skillTags						 =	SkillTag::where("entity_type_id", "=", $entityType)
			->where("entity_id", "=", $entityId)
			->get()
		;
		
		foreach ($skillTags as $skillTag) {
			
			$ids[]						 =	$skillTag->id;
			
		}
		
		return $ids;
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skill associated to a skill tag
	 * @return Array $skill[]
	 */
	public function skill()
	{
		
		return $this->hasOne(Skill::class, "id", "skill_id");
		
	}
	
}

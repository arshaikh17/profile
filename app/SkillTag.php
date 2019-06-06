<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AbstractModel;
use App\Skill;

class SkillTag extends AbstractModel
{
	
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
	 * Creates or updates skill tag
	 * 
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
	 * 
	 * @param App\SkillTag $skillTag
	 */
	public static function removeSkillTag(SkillTag $skillTag)
	{
		
		$skillTag->delete();
		
	}
	
	/**
	 * Returns current ids associated to SkillTag model
	 * 
	 * @param Integer $entityType
	 * @param Integer $entityId
	 * @return array $ids
	 */
	public static function getCurrentIDs($entityType, $entityId)
	{
		
		$skillTags						 =	SkillTag::where("entity_type_id", "=", $entityType)
			->where("entity_id", "=", $entityId)
			->get()
		;
		
		return parent::getModelIDs($skillTags);
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skill associated to a skill tag
	 * 
	 * @return Array $skill[]
	 */
	public function skill()
	{
		
		return $this->hasOne(Skill::class, "id", "skill_id");
		
	}
	
}

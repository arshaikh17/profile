<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;
use App\Models\Profile\Skill;

use App\Traits\ProfileTrait;

class SkillTag extends AbstractModel
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"profile_skill_tags";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"entity_type_id",
		"entity_id",
		"skill_id"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param Array $data[]
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
	 * Removes record
	 * 
	 * @param App\Models\Profile\SkillTag $skillTag
	 */
	public static function removeSkillTag(SkillTag $skillTag)
	{
		
		$skillTag->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
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
		
		return (new self)->getModelIDs($skillTags);
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skill associated to a skill tag
	 * 
	 * @return App\Models\Profile\Skill $skill
	 */
	public function skill()
	{
		
		return $this->hasOne(Skill::class, "id", "skill_id");
		
	}
	
}

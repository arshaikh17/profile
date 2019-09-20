<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ProfileTrait;

class SocialMedia extends Model
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"profile_social_medias";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"url",
		"icon",
		"type_id"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"type"
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_FACEBOOK					 =	1;
	CONST TYPE_TWITTER					 =	2;
	CONST TYPE_LINKEDIN					 =	3;
	CONST TYPE_GITHUB					 =	4;
	CONST TYPE_STACKOVERFLOW			 =	5;
	CONST TYPE_GMAIL					 =	6;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns social media types
	 * 
	 * @return array $types[]
	 */
	public static function getTypes()
	{
		
		return [
			self::TYPE_FACEBOOK			 =>	"Facebook",
			self::TYPE_TWITTER			 =>	"Twitter",
			self::TYPE_LINKEDIN			 =>	"LinkedIn",
			self::TYPE_GITHUB			 =>	"GitHub",
			self::TYPE_STACKOVERFLOW	 =>	"Stack Overflow",
			self::TYPE_GMAIL			 =>	"Gmail"
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param json $data[]
	 */
	public static function saveSocialMedia($data)
	{
		
		SocialMedia::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"url"						 =>	$data->url,
			"icon"						 =>	$data->icon,
			"type_id"					 =>	$data->type_id
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\SocialMedia $socialMedia
	 */
	public static function removeSocialMedia(SocialMedia $socialMedia)
	{
		
		$socialMedia->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(SocialMedia::all());
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Returns type
	 * 
	 * @return String $type
	 */
	public function getTypeAttribute()
	{
		
		return self::getTypes()[$this->type_id] ?? "";
		
	}
	
}

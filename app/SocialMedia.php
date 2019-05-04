<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model {
	
	//Table name
	protected $table					 =	"social_medias";
	
	//Fillable columns
	protected $fillable					 =	[
		"url",
		"icon",
		"type_id"
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
	
	/**
	 * Returns social media types
	 * @return array $types[]
	 */
	public static function getTypes () {
		
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
	 * Updates social media
	 * @param json $data[]
	 */
	public static function saveSocialMedia ($data) {
		
		SocialMedia::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"url"						 =>	$data->url,
			"icon"						 =>	$data->icon,
			"type_id"					 =>	$data->type_id
		]);
		
	}
	
	/**
	 * Removes social media
	 * @param App\SocialMedia $socialMedia
	 */
	public static function removeSocialMedia (SocialMedia $socialMedia) {
		
		$socialMedia->delete();
		
	}
	
	/**
	 * Returns current social media ids
	 * @return array $ids
	 */
	public static function getCurrentIDs () {
		
		$ids							 =	[];
		
		foreach (SocialMedia::all() as $socialMedia) {
			
			$ids[]						 =	$socialMedia->id;
			
		}
		
		return $ids;
		
	}
	
}

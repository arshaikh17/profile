<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\Character;
use App\Models\Comics\Arc;
use App\Models\Comics\Issue;

class Series extends Model
{
	
	/**
	 * Traits
	 */
	use ComicsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"is_completed",
		"cover"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"is_completed",
	];
	
	/**
	 * Scoped variables
	 */
	public static $path_logo			 =	"/uploads/comics/series/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Series::all());
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns character associated with series
	 * 
	 * @return App\Models\Comics\Character $character
	 */
	public function character()
	{
		
		return $this->belongsTo(Character::class, "character_id", "id");
		
	}
	
	/**
	 * Returns arcs under the series
	 * 
	 * @return App\Models\Comics\Arc $arcs[]
	 */
	public function arcs()
	{
		
		return $this->hasMany(Arc::class, "series_id", "id");
		
	}
	
	/**
	 * Returns issues under the series
	 * 
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function issues()
	{
		
		return $this->hasMany(Issue::class, "series_id", "id");
		
	}
	
	/**
	 * Returns issues under the series with no arcs
	 * 
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function singleIssues()
	{
		
		return $this->hasMany(Issue::class, "series_id", "id")
			->whereNull("arc_id")
		;
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Returns series completion attribute depending on arc completion
	 * 
	 * @return Boolean $is_completed
	 */
	public function getIsCompletedAttribute()
	{
		
		return $this->issues()
			->where("is_wishlist", "=", Issue::STATUS_WISHLIST)
			->count()
			? true
			: false
		;
		
	}
	
}

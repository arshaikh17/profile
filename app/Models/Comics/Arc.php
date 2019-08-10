<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\Series;
use App\Models\Comics\Arc;
use App\Models\Comics\Issue;

class Arc extends Model
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
		"series_id"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"is_completed",
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Arc $arc
	 * @param json $data[]
	 */
	public static function saveArc(Arc $arc, $data)
	{
		
		$arc->fill([
			"title"						 =>	$data["title"] ?? "",
		]);
		
		if ($data["series_id"] ?? false) $arc->series()->associate(Series::find($data["series_id"]));
		
		$arc->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Comics\Arc $arc
	 */
	public static function removeArc(Arc $arc)
	{
		
		$arc->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * @return App\Models\Comics\Arc $arcs[]
	 */
	public static function searchArcs($term)
	{
		
		return Arc::whereRaw("title LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Arc::all());
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns series associated with arc
	 * 
	 * @return App\Models\Comics\Series $series
	 */
	public function series()
	{
		
		return $this->belongsTo(Series::class, "series_id", "id");
		
	}
	
	/**
	 * Returns issues associated with arc
	 * 
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function issues()
	{
		
		return $this->hasMany(Issue::class, "arc_id", "id");
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/**
	 * Returns arc completion attribute
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

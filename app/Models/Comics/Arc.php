<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;
use App\Models\Comics\Series;
use App\Models\Comics\Arc;

class Arc extends Model
{
	
	use ModelTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"comics_arcs";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"is_completed",
		"series_id"
	];
	
	/**
	 * Constants
	 */
	CONST STATUS_INCOMPLETE				 =	0;
	CONST STATUS_COMPLETE				 =	1;
	
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
			"title"						 =>	$data->title,
			"is_completed"				 =>	$data->is_completed ? self::STATUS_COMPLETE : self::STATUS_INCOMPLETE
		]);
		
		if ($data->series_id) $arc->series()->associate(Series::find($data->series_id));
		
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
	
	/**
	 * Returns arc status types
	 * 
	 * @return array $statuses
	 */
	public static function getStatusTypes()
	{
		
		return [
			self::STATUS_INCOMPLETE		 =>	"Incomplete",
			self::STATUS_COMPLETE		 =>	"Completed",
		];
		
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
	 * @param Bool $includeWishlists
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function issues($includeWishlists = true)
	{
		
		$issues							 =	$this->hasMany(Issue::class, "arc_id", "id");
		
		if (!$includeWishlists) $issues->where("is_wishlist", "=", Issue::STATUS_OWNED);
		
		return $includeWishlists ? $issues : $issues->get();
		
	}
	
}

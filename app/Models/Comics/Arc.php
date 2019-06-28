<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;
use App\Models\Comics\Series;

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
	CONST STATUS_COMPLETE				 =	1;
	CONST STATUS_WISHLIST				 =	2;
	
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
			"is_completed"				 =>	$data->is_completed ?: 0
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
			self::STATUS_COMPLETE		 =>	"Completed",
			self::STATUS_WISHLIST		 =>	"Wishlist"
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
	
}

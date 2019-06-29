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
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function issues()
	{
		
		return $this->hasMany(Issue::class, "arc_id", "id");
		
	}
	
}

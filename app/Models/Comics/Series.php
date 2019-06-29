<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;
use App\Models\Comics\Character;
use App\Models\Comics\Arc;

class Series extends Model
{
	
	use ModelTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"comics_series";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"is_completed"
	];
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Series $series
	 * @param json $data[]
	 */
	public static function saveSeries(Series $series, $data)
	{
		
		$series->fill([
			"title"						 =>	$data->title,
			"is_completed"				 =>	$data->is_completed ?: 0
		]);
		
		if ($data->character_id) $series->character()->associate(Character::find($data->character_id));
		
		$series->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	public static function removeSeries(Series $series)
	{
		
		$series->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids
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
	 * @return App\Models\Comics\Arc $arcs
	 */
	public function arcs()
	{
		
		return $this->hasMany(Arc::class, "series_id", "id");
		
	}
	
}

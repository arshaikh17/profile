<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;

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
	 * @param json $data[]
	 */
	public static function saveSeries($data)
	{
		
		Series::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"is_completed"				 =>	$data->is_completed ?: 0
		]);
		
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
	
}

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
		"is_completed",
		"cover"
	];
	
	/**
	 * Scoped variables
	 */
	private static $path_logo			 =	"/uploads/comics/series/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Series $series
	 * @param json $data[]
	 */
	public static function saveSeries(Series $series, $data)
	{
		
		$cover							 =	$series->cover;
		
		if ($data->hasFile("cover")) {
			
			$file						 =	$data->file("cover");
			
			//if (file_exists(public_path() . self::$path_logo . $cover)) var_dump(unlink(public_path() . self::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . self::$path_logo, $cover);
			
		}
		
		$series->fill([
			"title"						 =>	$data->title,
			"is_completed"				 =>	$data->is_completed ?: 0,
			"cover"						 =>	$cover
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
	 * Searches the model
	 * 
	 * @param String $term
	 * @return App\Models\Comics\Series $series[]
	 */
	public static function searchSeries($term)
	{
		
		return Series::whereRaw("title LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
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
	 * 							METHODS						
	 * ===================================================*/
	
	/**
	 * Returns issues with no arcs associated
	 * 
	 * @return App\Models\Comics\Issues $issues[]
	 */
	public function issuesWithoutArcs()
	{
		
		return Issue::whereNull("arc_id")
			->where("series_id", "=", $this->id)
			->get()
		;
		
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
	
}

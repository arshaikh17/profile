<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\Series;
use App\Models\Comics\Arc;

class Character extends Model
{
	
	/**
	 * Traits
	 */
	use ComicsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"name",
		"cover"
	];
	
	/**
	 * Scoped Variable
	 */
	private static $path_logo			 =	"/uploads/comics/characters/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Character $character
	 * @param json $data[]
	 */
	public static function saveCharacter(Character $character, $data)
	{
		
		$cover							 =	$character->cover;
		
		if ($data["cover"] ?? false) {
			
			$file						 =	$data["cover"];
			
			//if (file_exists(public_path() . self::$path_logo . $cover)) var_dump(unlink(public_path() . self::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . self::$path_logo, $cover);
			
		}
		
		Character::updateOrCreate([
			"id"						 =>	$character->id
		], [
			"name"						 =>	$data["name"],
			"cover"						 =>	$cover
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Comics\Character $character
	 */
	public static function removeCharacter(Character $character)
	{
		
		$character->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * @return App\Models\Comics\Character $characters[]
	 */
	public static function searchCharacters($term)
	{
		
		return Character::whereRaw("name LIKE '%" . $term . "%'")
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
		
		return (new self)->getModelIDs(Character::all());
		
	}
	
	/* =====================================================
	 * 							METHODS						
	 * ===================================================*/
	
	/**
	 * Returns arcs associated with character
	 * 
	 * @return App\Models\Comics\Arc $arcs[]
	 */
	public function arcs()
	{
		
		$seriesIds						 =	$this->series()->pluck("id")->toArray();
		
		return Arc::whereIn("comics_arcs.series_id", $seriesIds)
			->get()
		;
		
	}
	
	/**
	 * Returns issues associated with character
	 * 
	 * @param Bool $sorted
	 * @return App\Models\Comics\Issues $issues[]
	 */
	public function issues($sorted = false)
	{
		
		if ($sorted) {
		
			$series = [];
			
			foreach ($this->series as $singleSeries) {
				
				$issues					 =	$singleSeries
					->issues()
					->orderBy("issue", "ASC")
				;
				
				
				$issues					 =	$issues->get();
				
				$series[$singleSeries->title]["series"]		 =	$singleSeries;
				$series[$singleSeries->title]["arcs"]		 =	[];
				$series[$singleSeries->title]["singles"]	 =	[];
				
				foreach ($issues as $key => $issue) {
					
					if ($issue->arc) {
						
						$series[$singleSeries->title]["arcs"][$issue->arc->title]["arc"]			 =	$issue->arc;
						$series[$singleSeries->title]["arcs"][$issue->arc->title]["issues"][]		 =	$issue;
						
					}
					
					if (!$issue->arc && isset($series[$singleSeries->title])) $series[$singleSeries->title]["singles"][] =	$issue;
					
				}
				
			}
			
			return $series;
			
		}
		
		$seriesIds						 =	$this->series()->pluck("id")->toArray();
		
		$issues							 =	Issue::whereIn("series_id", $seriesIds);
		
		return $issues->get();
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns series associated with character
	 * 
	 * @return App\Models\Comics\Series $series[]
	 */
	public function series()
	{
		
		return $this->hasMany(Series::class, "character_id", "id");
		
	}
	
}

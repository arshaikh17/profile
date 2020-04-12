<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\{
	Series,
	Arc
};

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
		"cover",
		"symbol"
	];
	
	/**
	 * Scoped Variable
	 */
	public static $path_logo			 =	"/uploads/comics/characters/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
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

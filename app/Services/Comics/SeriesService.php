<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\SeriesController;

use App\Models\Comics\{
	Series,
	Character
};

class SeriesService
{
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		//
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Series $series
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Series $series
	 */
	public function save(Series $series, Array $data)
	{
		
		$cover							 =	$series->cover;
		
		if ($data["cover"] ?? false) {
			
			$file						 =	$data["cover"];
			
			//if (file_exists(public_path() . Series::$path_logo . $cover)) var_dump(unlink(public_path() . Series::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . Series::$path_logo, $cover);
			
		}
		
		$series->fill([
			"title"						 =>	$data["title"] ?? "",
			"cover"						 =>	$cover
		]);
		
		if ($data["character_id"] ?? false) $series->character()->associate(Character::find($data["character_id"]));
		
		$series->save();
		
		return $series;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	public function delete(Series $series)
	{
		
		$series->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * 
	 * @return App\Models\Comics\Series $series[]
	 */
	public function search($term)
	{
		
		return Series::whereRaw("title LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
}

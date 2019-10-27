<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\ArcController;

use App\Models\Comics\{
	Arc,
	Series
};

class ArcService
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
	 * @param App\Models\Comics\Arc $arc
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Arc $arc
	 */
	public function save(Arc $arc, Array $data)
	{
		
		$arc->fill([
			"title"						 =>	$data["title"] ?? "",
		]);
		
		if ($data["series_id"] ?? false) $arc->series()->associate(Series::find($data["series_id"]));
		
		$arc->save();
		
		return $arc;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Arc $arc
	 */
	public function delete(Arc $arc)
	{
		
		$arc->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * 
	 * @return App\Models\Comics\Arc $arcs[]
	 */
	public static function search($term)
	{
		
		return Arc::whereRaw("title LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
}

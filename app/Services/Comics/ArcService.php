<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\ArcController;

use App\Models\Comics\Arc;

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
	
}

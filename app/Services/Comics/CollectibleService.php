<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;

use App\Models\Comics\Collectible;

use Illuminate\Support\Facades\Storage;

class CollectibleService
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
	 * @param App\Models\Comics\Collectible $collectible
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Collectible $collectible
	 */
	public function save(Collectible $collectible, Array $data)
	{
		
		$image							 =	$collectible->image;
		
		if ($data["image"] ?? false) {
			
			$file						 =	$data["image"];
			
			$image						 =	time() . "." . $file->getClientOriginalExtension();
			
			moveToStorage("comics-collectibles", $image, $file, $collectible->image);
			
		}
		
		$data["image"]					 =	$image;
		
		$collectible->fill($data);
		
		$collectible->save();
		
		return $collectible;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Collectible $collectible
	 */
	public function delete(Collectible $collectible)
	{
		
		$collectible->delete();
		
	}
	
}

<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\CharacterController;

use App\Models\Comics\Character;

class CharacterService
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
	 * @param App\Models\Comics\Character $character
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Character $character
	 */
	public function save(Character $character, Array $data)
	{
		
		$cover							 =	$character->cover;
		
		if ($data["cover"] ?? false) {
			
			$file						 =	$data["cover"];
			
			//if (file_exists(public_path() . Character::$path_logo . $cover)) var_dump(unlink(public_path() . Character::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . Character::$path_logo, $cover);
			
		}
		
		$character->fill([
			"name"						 =>	$data["name"],
			"cover"						 =>	$cover
		]);
		
		$character->save();
		
		return $character;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Character $character
	 */
	public function delete(Character $character)
	{
		
		$character->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * 
	 * @return App\Models\Comics\Character $characters[]
	 */
	public static function search($term)
	{
		
		return Character::whereRaw("name LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
}

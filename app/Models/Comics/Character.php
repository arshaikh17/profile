<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;
use App\Models\Comics\Series;

class Character extends Model
{
	
	use ModelTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"comics_characters";
	
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
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Character $character
	 * @param json $data[]
	 */
	public static function saveCharacter(Character $character, $data)
	{
		
		$cover							 =	$character->cover;
		
		if ($data->hasFile("cover")) {
			
			$file						 =	$data->file("cover");
			
			//if (file_exists(public_path() . self::$path_logo . $cover)) var_dump(unlink(public_path() . self::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . self::$path_logo, $cover);
			
		}
		
		Character::updateOrCreate([
			"id"						 =>	$character->id
		], [
			"name"						 =>	$data->name,
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
	 * Returns current ids associated to model
	 * 
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Character::all());
		
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

<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ProfileTrait;

class CV extends Model
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"cv",
		"is_main"
	];
	
	/**
	 * Scoped variables
	 */
	public static $path_cv				 =	"/uploads/profile/cvs/";
	protected static $mime_types		 =	[
		"application/pdf"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Profile\CV $cv
	 * @param Array $data[]
	 */
	public static function saveCV(CV $cv, $data)
	{
		
		$cv_name						 =	$data["cv_name"] ?? "";
		$cv_file						 =	$data["cv"] ?? false;
		
		if ($cv_file && in_array($cv_file->getClientMimeType(), self::$mime_types)) {
			
			$cv_name					 =	time() . "." . $cv_file->getClientOriginalName();
			$cv_file->move(public_path() . self::$path_cv, $cv_name);
			
		}
		
		if (isset($data["is_main"])) self::updateIsMainColumn();
		
		CV::updateOrCreate([
			"id"						 =>	$cv->id
		], [
			"title"						 =>	$data["title"],
			"cv"						 =>	$cv_name,
			"is_main"					 =>	$data["is_main"] ?? 0
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\CV $cv
	 */
	public static function removeCV(CV $cv)
	{
		
		$cv->delete();
		
	}
	
	/**
	 * Update is_main column of all CV
	 */
	public static function updateIsMainColumn()
	{
		
		CV::where("is_main", "=", 1)
			->update([
				"is_main"				 =>	0
			])
		;
		
	}
	
	/**
	 * Returns Main CV
	 * 
	 * @return App\Models\Profile\CV $cv
	 */
	public static function getActiveCV()
	{
		
		return CV::where("is_main", "=", 1)
			->first()
		;
		
	}
	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
	
	/**
	 * Table
	 */
	protected $table					 =	"cvs";
	
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
	public static $path_cv			 =	"/uploads/cv/";
	protected static $mime_types		 =	[
		"application/pdf"
	];
	
	/**
	 * Updates cv
	 * @param json $data[]
	 */
	public static function saveCV($data)
	{
		
		$cv_name						 =	$data->cv_name ?? "";
		$cv								 =	$data->cv;
		
		if ($data->hasFile("cv") && in_array($cv->getClientMimeType(), self::$mime_types)) {
			
			$cv_name					 =	time() . "." . $cv->getClientOriginalName();
			$cv->move(public_path() . self::$path_cv, $cv_name);
			
		}
		
		self::updateIsMainColumn();
		
		CV::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"cv"						 =>	$cv_name,
			"is_main"					 =>	$data->is_main ?: 0
		]);
		
	}
	
	/**
	 * Removes CV
	 * @param App\CV $cv
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
	
}

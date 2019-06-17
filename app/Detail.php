<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
	
	/**
	 * Table name
	 */
	//protected $table					 =	"about_me";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"key",
		"value",
	];
	
	/**
	 * Casts
	 */
	/*protected $casts					 =	[
		"responsibilities"				 =>	"array"
	];*/
	
	/**
	 * Scoped Variables
	 */
	protected static $path_profile		 =	"/uploads/profile/";
	
	/**
	 * Override parent method to return custom output
	 * Returns details
	 * 
	 * @return Detail $details[]
	 */
	public static function all($columns = [])
	{
		$detailRows						 =	parent::all();
		
		$details						 =	[];
		
		foreach ($detailRows as $detail) {
			
			$details[$detail->key]		 = $detail->value;
			
		}
		
		return (object) $details;
		
	}
	
	/**
	 * Saves details
	 * 
	 * @param json $data[]
	 */
	public static function saveDetails($data)
	{
		
		foreach ($data as $key => $value) {
			
			//Special Cases
			if ($key == "responsibilities") $value			 =	json_encode($value);
			
			Detail::updateOrCreate([
				"key"					 =>	$key
			], [
				"key"					 =>	$key,
				"value"					 =>	$value
			]);
			
		}
		
	}
	
}

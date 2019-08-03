<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ProfileTrait;

class Detail extends Model
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"key",
		"value",
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Override parent method to return custom output
	 * Returns details
	 * 
	 * @return App\Models\Profile\Detail $details[]
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
	 * Saves record
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

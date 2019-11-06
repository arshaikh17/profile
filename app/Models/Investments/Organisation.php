<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

class Organisation extends Model
{
	
	/**
	 * Traits
	 */
	use InvestmentsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"name",
		"logo",
		"type_id",
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_IT						 =	1;
	CONST TYPE_OTHERS					 =	9;
	
	/**
	 * Scoped variables
	 */
	public static $path_logo			 =	"/uploads/investments/organisations/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns organisations types
	 * 
	 * @param Array
	 */
	public static function getTypes()
	{
		
		return [
			self::TYPE_IT				 =>	"IT & Software",
			self::TYPE_OTHERS			 =>	"Others",
		];
		
	}
	
}

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
	 * Appends
	 */
	protected $appends					 =	[
		"type",
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
	
	/* =====================================================
	 * 							ACCESSORS					
	 * ===================================================*/
	
	/**
	 * Returns type appended column
	 * 
	 * @return string
	 */
	public function getTypeAttribute()
	{
		
		return self::getTypes()[$this->type_id] ?? "-";
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns investments
	 * 
	 * @return App\Models\Investments\Investment[]
	 */
	public function investments()
	{
		
		return $this->hasMany(Investment::class, "organisation_id", "id");
		
	}
	
}

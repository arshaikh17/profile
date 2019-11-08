<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

class Investment extends Model
{
	
	/**
	 * Traits
	 */
	use InvestmentsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"amount",
		"return_type",
		"roi_percentage",
		"type",
		"type_category",
		"currency_id",
		"organisation_id",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"type_name",
		"return_type_name",
		"currency",
		"roi_return_amount",
	];
	
	/**
	 * Dates
	 */
	protected $dates					 =	[
		"created_at",
		"updated_at",
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_SHARES					 =	1;
	CONST TYPE_PROPERTY					 =	2;
	
	CONST RETURN_TYPE_MONTHLY			 =	1;
	CONST RETURN_TYPE_YEARLY			 =	2;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns investments types
	 * 
	 * @return array
	 */
	public static function getTypes()
	{
		
		return [
			self::TYPE_SHARES			 =>	"Shares",
			self::TYPE_PROPERTY			 =>	"Property",
		];
		
	}
	
	/**
	 * Returns investments return types
	 * 
	 * @return array
	 */
	public static function getReturnTypes()
	{
		
		return [
			self::RETURN_TYPE_MONTHLY	 =>	"Monthly",
			self::RETURN_TYPE_YEARLY	 =>	"Yearly",
		];
		
	}
	
	/**
	 * Returns currencies
	 * 
	 * @return array
	 */
	public static function getCurrencies()
	{
		
		return [
			1							 =>	"PKR",
			2							 =>	"£",
			3							 =>	"$",
		];
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Returns type_name appended column
	 * 
	 * @return String
	 */
	public function getTypeNameAttribute()
	{
		
		return self::getTypes()[$this->type] ?? "-";
		
	}
	
	/**
	 * Returns return_type_name appended column
	 * 
	 * @return String
	 */
	public function getReturnTypeNameAttribute()
	{
		
		return self::getReturnTypes()[$this->return_type] ?? "-";
		
	}
	
	/**
	 * Returns currency appended column
	 * 
	 * @return String
	 */
	public function getCurrencyAttribute()
	{
		
		return self::getCurrencies()[$this->currency_id] ?? "-";
		
	}
	
	/**
	 * Returns roi_return_amount appended column
	 * 
	 * @return String
	 */
	public function getRoiReturnAmountAttribute()
	{
		
		return ($this->roi_percentage * $this->amount) / 100;
		
	}
	
}

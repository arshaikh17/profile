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
		"roi_percentage",
		"type_id",
		"type_category",
		"return_type_id",
		"currency_id",
		"organisation_id",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"type",
		"return_type",
		"currency",
		"roi_amount",
		"total_roi_amount"
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
	public function getTypeAttribute()
	{
		
		return self::getTypes()[$this->type_id] ?? "-";
		
	}
	
	/**
	 * Returns return_type_name appended column
	 * 
	 * @return String
	 */
	public function getReturnTypeAttribute()
	{
		
		return self::getReturnTypes()[$this->return_type_id] ?? "-";
		
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
	public function getRoiAmountAttribute()
	{
		
		return ($this->roi_percentage * $this->amount) / 100;
		
	}
	
	/**
	 * Return total_returns column
	 * 
	 * @return Double
	 */
	public function getTotalRoiAmountAttribute()
	{
		
		return $this->rois()->sum("amount");
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns ROIs
	 * 
	 * @return App\Models\Investments\ROI[]
	 */
	public function rois()
	{
		
		return $this->hasMany(ROI::class, "investment_id", "id");
		
	}
	
}

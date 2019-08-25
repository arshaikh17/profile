<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesTrait;

class Bill extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"bill_of",
		"amount",
		"paid_on",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"bill",
	];
	
	/**
	 * Constants
	 */
	CONST BILL_RENT						 =	1;
	CONST BILL_MOBILE					 =	2;
	CONST BILL_INTERNET					 =	3;
	CONST BILL_NETFLIX					 =	4;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns bill types or names
	 * 
	 * @param Array $bills
	 */
	public static function getBills()
	{
		
		return [
			self::BILL_RENT				 =>	"Rent",
			self::BILL_MOBILE			 =>	"Mobile",
			self::BILL_INTERNET			 =>	"Internet",
			self::BILL_NETFLIX			 =>	"Netflix",
		];
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/**
	 * Maps "bill_of" column with types of Bills
	 * 
	 * @return String $bill
	 */
	public function getBillAttribute()
	{
		
		return self::getBills()[$this->bill_of];
		
	}
}

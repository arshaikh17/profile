<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesTrait;

class Amount extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"key",
		"value",
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_BANK_BALANCE				 =	1;
	CONST TYPE_LOAN						 =	2;
	CONST TYPE_SAVING					 =	3;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns types
	 * 
	 * @return Array $types
	 */
	public static function getTypes()
	{
		
		return [
			self::TYPE_BANK_BALANCE		 =>	"Bank Balance",
			self::TYPE_LOAN				 =>	"Load",
			self::TYPE_SAVING			 =>	"Saving",
		];
		
	}
	
}

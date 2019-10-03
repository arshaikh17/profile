<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense
};

use Carbon\Carbon;
use DateTime;

class Saving extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	2;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Saving $saving
	 * @param Array $data
	 */
	public static function saveSaving(Saving $saving, $data)
	{
		
		$data							 =	array_merge($data, [
			"is_paid"					 =>	Expense::UNPAID,
			"tag_id"					 =>	0,
		]);
		
		self::saveExpense($saving, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Saving $saving
	 */
	public static function removeSaving(Saving $saving)
	{
		
		self::removeExpense($saving);
		
	}
	
	/**
	 * Get Saving
	 * 
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Saving[]
	 */
	public static function getSaving(Carbon $date)
	{
		
		return self::getExpenses((new self), $date)
			->first()
		;
		
	}
	
}

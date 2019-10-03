<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense
};

use Carbon\Carbon;

class Allowance extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	3;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Allowance $allowance
	 * @param Array $data
	 */
	public static function saveAllowance(Allowance $allowance, $data)
	{
		
		$data							 =	array_merge($data, [
			"is_paid"					 =>	Expense::UNPAID,
			"tag_id"					 =>	0,
		]);
		
		self::saveExpense($allowance, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public static function removeAllowance(Allowance $allowance)
	{
		
		self::removeExpense($allowance);
		
	}
	
	/**
	 * Get Allowances
	 * 
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Allowance[]
	 */
	public static function getAllowances(Carbon $date)
	{
		
		return self::getExpenses((new self), $date)
			->get()
		;
		
	}
	
	/**
	 * Returns total Allowances amount
	 * 
	 * @param Carbon $date
	 * 
	 * @return Double $amount
	 */
	public static function getTotalAllowances(Carbon $date)
	{
		
		return Allowance::whereMonthAndYear("date", "=", $date)
			->selectRaw("SUM(amount) as total")
			->first()
			->toArray()["total"]
		;
		
	}
	
}

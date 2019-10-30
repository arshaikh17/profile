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
			->selectRaw("SUM(amount) as total, is_paid")
			->first()
			->toArray()
		;
		
	}
	
}

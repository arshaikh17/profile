<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense
};

use Carbon\Carbon;

class Bill extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	4;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Get bills
	 * 
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Bill[]
	 */
	public static function getBills(Carbon $date)
	{
		
		return self::getExpenses((new self), $date)
			->get()
		;
		
	}
	
	/**
	 * Counts total amount in bills by date
	 * 
	 * @param Carbon $date
	 * 
	 * @return Double $totalAmount
	 */
	public static function getTotalBillsPaid(Carbon $date)
	{
		
		return Bill::whereMonthAndYear("date", "=", $date)
			->selectRaw("SUM(amount) as total")
			->first()
			->toArray()["total"]
		;
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
}

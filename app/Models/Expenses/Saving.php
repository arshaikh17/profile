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
	 * Get Saving
	 * 
	 * @param Carbon\Carbon $date
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

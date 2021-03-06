<?php

namespace App\Models\Expenses\Payments;

use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense
};

use App\Models\Generals\Person;

use Carbon\Carbon;

class Debt extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	5;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Debt $debt
	 * @param Array $data
	 */
	public static function saveDebt(Debt $debt, $data)
	{
		
		$debt->person()->associate($data["person"]);
		
		self::saveExpense($debt, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Debt $debt
	 */
	public static function removeDebt(Debt $debt)
	{
		
		self::saveExpense($debt);
		
	}
	
	/**
	 * Get Debts
	 * 
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Debt[]
	 */
	public static function getDebts(Carbon $date)
	{
		
		return self::getExpenses((new self), $date)
			->get()
		;
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns tag associated with debt
	 * 
	 * @return App\Models\Generals\Person
	 */
	public function person()
	{
		
		return $this->belongsTo(Person::class, "tag_id", "id");
		
	}
	
}

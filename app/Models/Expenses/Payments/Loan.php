<?php

namespace App\Models\Expenses\Payments;

use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense
};

use App\Models\Generals\Person;

use Carbon\Carbon;

class Loan extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	6;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Loan $loan
	 * @param Array $data
	 */
	public static function saveLoan(Loan $loan, $data)
	{
		
		$loan->person()->associate($data["person"]);
		
		self::saveExpense($loan, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Loan $loan
	 */
	public static function removeLoan(Loan $loan)
	{
		
		self::saveExpense($loan);
		
	}
	
	/**
	 * Get Loans
	 * 
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Loan[]
	 */
	public static function getLoans(Carbon $date)
	{
		
		return self::getExpenses((new self), $date)
			->get()
		;
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns tag associated with loan
	 * 
	 * @return App\Models\Generals\Person
	 */
	public function person()
	{
		
		return $this->belongsTo(Person::class, "tag_id", "id");
		
	}
	
}

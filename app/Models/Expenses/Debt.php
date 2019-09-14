<?php

namespace App\Models\Expenses;

use App\Traits\ExpensesPaymentsTrait;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Debt extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesPaymentsTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $model_type				 =	1;
	
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
		
		self::savePayment($debt, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Debt $debt
	 */
	public static function removeDebt(Debt $debt)
	{
		
		self::removePayment($debt);
		
	}
	
	/**
	 * Get Debts
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Debt[]
	 */
	public static function getDebts(DateTime $dateTime)
	{
		
		return self::getPayments(new Debt, $dateTime);
		
	}
	
}

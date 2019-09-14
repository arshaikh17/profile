<?php

namespace App\Models\Expenses;

use App\Traits\ExpensesPaymentsTrait;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Owe extends Expense
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
	 * @param App\Models\Expenses\Owe $owe
	 * @param Array $data
	 */
	public static function saveOwe(Owe $owe, $data)
	{
		
		self::savePayment($owe, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Owe $owe
	 */
	public static function removeOwe(Owe $owe)
	{
		
		self::removePayment($owe);
		
	}
	
	/**
	 * Get Owes
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Owe[]
	 */
	public static function getOwes(DateTime $dateTime)
	{
		
		return self::getPayments(new Owe, $dateTime);
		
	}
	
}

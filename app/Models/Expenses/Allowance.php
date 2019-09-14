<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesGoalsTrait;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Allowance extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesGoalsTrait;
	
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
	 * @param App\Models\Expenses\Allowance $allowance
	 * @param Array $data
	 */
	public static function saveAllowance(Allowance $allowance, $data)
	{
		
		self::saveGoal($allowance, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public static function removeAllowance(Allowance $allowance)
	{
		
		self::removeGoal($allowance);
		
	}
	
	/**
	 * Get Allowances
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Allowance[]
	 */
	public static function getAllowances(DateTime $dateTime)
	{
		
		return self::getGoals(new Allowance, $dateTime);
		
	}
	
	/**
	 * Returns total Allowances amount
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return Double $amount
	 */
	public static function getTotalAllowances(DateTime $dateTime)
	{
		
		return Allowance::whereMonthAndYear("date", "=", $dateTime)
			->selectRaw("SUM(amount) as total")
			->where("status", "=", Expense::GOAL_ACTIVE)
			->first()
			->toArray()["total"]
		;
		
	}
	
}

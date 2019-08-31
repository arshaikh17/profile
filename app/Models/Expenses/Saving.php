<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesGoalsTrait;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Saving extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesGoalsTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $goal_type				 =	2;
	
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
		
		self::saveGoal($saving, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Saving $saving
	 */
	public static function removeSaving(Saving $saving)
	{
		
		self::removeGoal($saving);
		
	}
	
	/**
	 * Get Saving
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Saving[]
	 */
	public static function getSaving(DateTime $dateTime)
	{
		
		return Saving::whereMonthAndYear("date", "=", $dateTime)
			->first()
		;
		
	}
	
}

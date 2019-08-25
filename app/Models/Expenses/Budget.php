<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Budget extends Expense
{
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"title",
		"description",
		"amount",
		"date",
	];
	
	/**
	 * Casts
	 */
	protected $casts					 =	[
		"date"							 => "DateTime",
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Budget $budget
	 * @param Array $data
	 */
	public static function saveBudget(Budget $budget, $data)
	{
		
		$budget->fill($data);
		
		$budget->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Budget $budget
	 */
	public static function removeBudget(Budget $budget)
	{
		
		$budget->delete();
		
	}
	
	/**
	 * Gets budget set for the month
	 * 
	 * @param DateTime $dateTime
	 * @return App\Models\Expenses\Budget
	 */
	public static function getBudget(DateTime $dateTime)
	{
		
		/*$d = Budget::create(["title"=>"Salary", "description" => "Salary hai bhai", "amount" => "1600", "date" => new DateTime()]);
		dd($d);*/
		return Budget::whereMonthAndYear("date", "=", $dateTime)->first();
		
	}
	
	/**
	 * Checks for the month's 
	 */
	
}

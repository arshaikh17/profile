<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesTrait;

class Budget extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"title",
		"description",
		"amount",
		"date",
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
		
		$budget->fill([
			"title"						 =>	$data["title"],
			"description"				 =>	$data["description"] ?? "",
			"amount"					 =>	$data["amount"],
			"date"						 =>	$data["date"],
		]);
		
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
		
		
		
	}
	
	/* =====================================================
	 * 							RELATIONS					
	 * ===================================================*/
	
}

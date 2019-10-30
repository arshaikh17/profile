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
	 * Gets budget set for the month
	 * 
	 * @param DateTime $dateTime
	 * @return App\Models\Expenses\Budget
	 */
	public static function getBudget(DateTime $dateTime)
	{
		
		return Budget::whereMonthAndYear("date", "=", $dateTime)->first();
		
	}
	
}

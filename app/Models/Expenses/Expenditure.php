<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesExpendituresTrait;

use App\Models\Expenses\{
	Expense,
	Tag
};

use Carbon\Carbon;

use DateTime;

class Expenditure extends Expense
{
	
	/**
	 * Traits
	 */
	use ExpensesExpendituresTrait;
	
	/**
	 * Scoped varables
	 */
	protected $model_type				 =	1;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Gets expenditures
	 * 
	 * @param Carbon $date
	 * @param Bool $queryOnly
	 * 
	 * @return App\Models\Expenses\Expenditure[]
	 */
	public static function getExpenditures(Carbon $date, $queryOnly = false)
	{
		
		$query							 =	Expenditure::whereMonth("date", "=", $date)
			->whereYear("date", "=", $date)
			->orderBy("id", "DESC")
		;
		
		return $queryOnly ? $query : $query->get();
		
	}
	
	/**
	 * Counts total amount in expenditures by date
	 * 
	 * @param Carbon $dateTime
	 * 
	 * @return Double $totalAmount
	 */
	public static function getTotalAmountSpent(Carbon $dateTime)
	{
		
		return Expenditure::whereMonthAndYear("date", "=", $dateTime)
			->selectRaw("SUM(amount) as total")
			->first()
			->toArray()["total"]
		;
		
	}
	
	/**
	 * Amount spent by Tags
	 * 
	 * @param Carbon $dateTime
	 * 
	 * @return App\Models\Expenses\Expenditure[] $expenditure
	 */
	public static function getExpendituresByTags(Carbon $dateTime)
	{
		
		return Expenditure::selectRaw("t.id, t.name, SUM(expenses_expenditures.amount) AS total")
			->join("expenses_tags AS t", "t.id", "expenses_expenditures.tag_id")
			->groupBy("t.id") 
			->whereMonthAndYear("expenses_expenditures.date", "=", $dateTime)
			->get()
		;
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns tag associated with expenditure
	 * 
	 * @return App\Models\Expenses\Tag
	 */
	public function tag()
	{
		
		return $this->belongsTo(Tag::class, "tag_id", "id");
		
	}
	
}

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
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Expenditure $expenditure
	 * @param Array $data
	 */
	public static function saveExpenditure(Expenditure $expenditure, $data)
	{
		
		self::saveExpense($expenditure, $data);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Expenditure $expenditure
	 */
	public static function removeExpenditure(Expenditure $expenditure)
	{
		
		self::removeExpense($expenditure);
		
	}
	
	/**
	 * Gets expenditures
	 * 
	 * @param DateTime $date
	 * @param Bool $queryOnly
	 * 
	 * @return App\Models\Expenses\Expenditure[]
	 */
	public static function getExpenditures(DateTime $date, $queryOnly = false)
	{
		
		$query							 =	Expenditure::whereMonthAndYear("date", "=", $date)
			->orderBy("id", "DESC")
		;
		
		return $queryOnly ? $query : $query->get();
		
	}
	
	/**
	 * Counts total amount in expenditures by date
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return Double $totalAmount
	 */
	public static function getTotalAmountSpent(DateTime $dateTime)
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
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Expenditure[] $expenditure
	 */
	public static function getExpendituresByTags(DateTime $dateTime)
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

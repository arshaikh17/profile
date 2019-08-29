<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesTrait;

use App\Models\Expenses\{
	Expense,
	Tag
};

use DateTime;

class Expenditure extends Expense
{
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"amount",
		"description",
		"tag_id",
		"date",
	];
	
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
		
		$expenditure->fill($data);
		
		$expenditure->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Expenditure $expenditure
	 */
	public static function removeExpenditure(Expenditure $expenditure)
	{
		
		$expenditure->delete();
		
	}
	
	/**
	 * Gets expenditures
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Expenditure[]
	 */
	public static function getExpenditures(DateTime $dateTime)
	{
		
		return Expenditure::whereMonthAndYear("date", "=", $dateTime)
			->orderBy("id", "DESC")
			->get()
		;
		
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

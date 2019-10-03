<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesTrait;

use App\Models\Expenses\{
	Expenditure
};

use Carbon\Carbon;

use DateTime;
use DB;

class Expense extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
	/**
	 * Constants
	 */
	CONST GOAL_INACTIVE					 =	0;
	CONST GOAL_ACTIVE					 =	1;
	
	CONST UNPAID						 =	0;
	CONST PAID							 =	1;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns values for pie chart by tag distributons
	 * 
	 * @param $expenses
	 * @param Carbon\Carbon $date
	 * 
	 * @return Array $data
	 */
	public static function buildExpendituresByTagsChart($expenses, Carbon $date)
	{
		
		$data							 =	[];
		$labels							 =	[];
		$values							 =	[];
		
		foreach ($expenses as $expense) {
			
			$labels[]					 =	$expense->name;
			$values[]					 =	$expense->total;
			
		}
		
		$data["labels"]					 =	$labels;
		$data["values"][]				 =	[
			"label"						 =>	$date->format("F"),
			"values"					 =>	$values,
		];
		
		return $data;
		
	}
	
	/**
	 * Returns values for bar chart all expenses
	 * 
	 * @param $expensesQuery
	 * @param Carbon\Carbon $date
	 * 
	 * @return Array $data
	 */
	public static function buildExpendituresChart($expensesQuery, Carbon $date)
	{
		
		$data							 =	[];
		$labels							 =	[];
		$values							 =	[];
		
		$expenses						 =	$expensesQuery->selectRaw("date, SUM(amount) AS amount")
			->groupBy(DB::raw("DATE_FORMAT(date, 'd/m/Y')"))
			->get()
		;
		
		foreach ($expenses as $expense) {
			
			$labels[]					 =	Carbon::parse($expense->date)->format("dS");
			$values[]					 =	$expense->amount;
			
		}
		
		$data["labels"]					 =	$labels;
		$data["values"][]				 =	[
			"label"						 =>	$date->format("F"),
			"values"					 =>	$values,
		];
		
		return $data;
		
	}
	
	/* =====================================================
	 * 							SCOPES						
	 * ===================================================*/
	
	/**
	 * Applies month and year clause
	 * 
	 * @param Builder $query
	 * @param String $column
	 * @param String $relationalOperator
	 * @param Carbon $date
	 * 
	 * @return Builder $query
	 */
	public function scopeWhereMonthAndYear($query, $column, $relationalOperator, Carbon $date)
	{
		
		return $query->whereRaw("DATE_FORMAT({$column}, '%m/%Y') {$relationalOperator} ?", [$date->format("m/Y")]);
		
	}
	
}

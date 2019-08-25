<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ExpensesTrait;

use DateTime;

class Expense extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
	/* =====================================================
	 * 							SCOPES						
	 * ===================================================*/
	
	/**
	 * Applies month and year clause
	 * 
	 * @param Builder $query
	 * @param String $column
	 * @param String $relationalOperator
	 * @param DateTime $dateTime
	 * 
	 * @return Builder $query
	 */
	public function scopeWhereMonthAndYear($query, $column, $relationalOperator, DateTime $dateTime)
	{
		
		
		return $query->whereRaw("DATE_FORMAT({$column}, '%m/%Y') {$relationalOperator} ?", [$dateTime->format("m/Y")]);
		
	}
	
}

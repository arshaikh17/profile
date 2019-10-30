<?php

namespace App\Services\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpenseController;

use App\Models\Expenses\Expense;

use Carbon\Carbon;

class ExpenseService
{
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		//
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Expense $expense
	 * @param Array $data
	 * 
	 * @return App\Models\Expenses\Expense $expense
	 */
	public function save(Expense $expense, Array $data)
	{
		
		
		$data							 =	isset($data["date"]) ? $data : array_merge($data, ["date" => Carbon::now()]);
		
		$expense->fill($data);
		
		$expense->save();
		
		return $expense;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Expenses\Expense $expense
	 */
	public function delete(Expense $expense)
	{
		
		$expense->delete();
		
	}
	
}

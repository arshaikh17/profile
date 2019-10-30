<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\Budget;

class BudgetController extends Controller
{
	
	/**
	 * Saves budget
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		$this->service->save(new Budget, array_merge($request->toArray(), ["date" => $this->date]));
		
		return redirect()->back()->with("status", "Budget saved");
		
	}
	
	/**
	 * Updates budget
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Budget $budget
	 */
	public function update(Request $request, Budget $budget)
	{
		
		$this->service->save($budget, $request->toArray());
		
		return redirect()->back()->with("status", "Budget saved");
		
	}
	
}

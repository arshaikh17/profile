<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Allowance
};

class AllowanceController extends Controller
{
	
	/**
	 * Saves allowance
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Allowance::saveAllowance(new Allowance, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	Allowance::UNPAID
		]));
		
		return redirect()->back()->with("status", "Allowance saved");
		
	}
	
	/**
	 * Updates allowance
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public function update(Request $request, Allowance $allowance)
	{
		
		Allowance::saveAllowance($allowance, $request->toArray());
		
		return redirect()->back()->with("status", "Allowance saved");
		
	}
	
	/**
	 * Destroys allowance
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public function destroy(Request $request, Allowance $allowance)
	{
		
		Allowance::removeAllowance($allowance);
		
		return redirect()->back()->with("status", "Allowance removed");
		
	}
	
	/**
	 * Marks active
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public function markActive(Request $request, Allowance $allowance)
	{
		
		Allowance::updateStatus($allowance, Allowance::PAID);
		
		return redirect()->back()->with("status", "Allowance marked active");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Allowance $allowance
	 */
	public function markInactive(Request $request, Allowance $allowance)
	{
		
		Allowance::updateStatus($allowance, Allowance::UNPAID);
		
		return redirect()->back()->with("status", "Allowance inactive");
		
	}
	
}

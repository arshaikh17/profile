<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Saving
};

class GoalSavingController extends Controller
{
	
	/**
	 * Saves saving
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Saving::saveSaving(new Saving, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"status"					 =>	Saving::GOAL_ACTIVE
		]));
		
		return redirect()->back()->with("status", "Saving saved");
		
	}
	
	/**
	 * Updates saving
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Saving $saving
	 */
	public function update(Request $request, Saving $saving)
	{
		
		Saving::saveSaving($saving, $request->toArray());
		
		return redirect()->back()->with("status", "Saving saved");
		
	}
	
	/**
	 * Marks active
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Saving $saving
	 */
	public function markActive(Request $request, Saving $saving)
	{
		
		Saving::updateStatus($saving, Saving::GOAL_ACTIVE);
		
		return redirect()->back()->with("status", "Saving marked active");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Saving $saving
	 */
	public function markInactive(Request $request, Saving $saving)
	{
		
		Saving::updateStatus($saving, Saving::GOAL_INACTIVE);
		
		return redirect()->back()->with("status", "Saving inactive");
		
	}
	
}

<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Expenditure
};

class ExpenditureController extends Controller
{
	
	/**
	 * Saves expenditure
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		$this->service->save(new Expenditure, array_merge($request->toArray(), ["date" => $this->date]));
		
		return redirect()->back()->with("status", "Expenditure saved");
		
	}
	
	/**
	 * Updates expenditure
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Expenditure $expenditure
	 */
	public function update(Request $request, Expenditure $expenditure)
	{
		
		$this->service->save($expenditure, array_merge($request->toArray(), ["date" => $this->date]));
		
		return redirect()->back()->with("status", "Expenditure saved");
		
	}
	
	/**
	 * Destroys expenditure
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Expenditure $expenditure
	 */
	public function destroy(Request $request, Expenditure $expenditure)
	{
		
		$this->service->delete($expenditure);
		
		return redirect()->back()->with("status", "Expenditure removed");
		
	}
	
}

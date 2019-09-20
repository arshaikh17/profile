<?php

namespace App\Http\Controllers\Expenses\Payments;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Generals\Person;
use App\Models\Expenses\Payments\{
	DebtReturn
};

class DebtReturnController extends Controller
{
	
	/**
	 * Saves debtReturn
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 */
	public function store(Request $request, Person $person)
	{
		
		DebtReturn::saveDebt(new DebtReturn, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	$request->is_paid ? DebtReturn::PAID : DebtReturn::UNPAID,
			"person"					 =>	$person,
		]));
		
		if ($request->is_paid) $person->deductAmount(Person::AMOUNT_DEBT, $request->amount);
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Updates debtReturn
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtReturn $debtReturn
	 */
	public function update(Request $request, Person $person, DebtReturn $debtReturn)
	{
		
		DebtReturn::saveDebt($debtReturn, array_merge($request->toArray(), [
			"is_paid"					 =>	$request->is_paid ? DebtReturn::PAID : DebtReturn::UNPAID,
		]));
		
		if ($request->is_paid) {
			
			$amount						 =	$debtReturn->amount - $request->amount;
			
			if ($amount <= 0) $person->deductAmount(Person::AMOUNT_DEBT, $amount);
			if ($amount >= 0) $person->addAmount(Person::AMOUNT_DEBT, $amount);
			
		}
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtReturn $debtReturn
	 */
	public function destroy(Request $request, Person $person, DebtReturn $debtReturn)
	{
		
		DebtReturn::removeDebt($debtReturn);
		
		$person->addAmount(Person::AMOUNT_DEBT, $debtReturn->amount);
		
		return redirect()->back()->with("status", "Payment deleted");
		
	}
	
	/**
	 * Marks paid
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtReturn $debtReturn
	 */
	public function markPaid(Request $request, Person $person, DebtReturn $debtReturn)
	{
		
		DebtReturn::updateStatus($debtReturn, DebtReturn::GOAL_ACTIVE);
		
		$person->deductAmount(Person::AMOUNT_DEBT, $debtReturn->amount);
		
		return redirect()->back()->with("status", "Payment marked paid");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtReturn $debtReturn
	 */
	public function markUnpaid(Request $request, Person $person, DebtReturn $debtReturn)
	{
		
		DebtReturn::updateStatus($debtReturn, DebtReturn::GOAL_INACTIVE);
		
		$person->addAmount(Person::AMOUNT_DEBT, $debtReturn->amount);
		
		return redirect()->back()->with("status", "Payment marked unpaid");
		
	}
	
	/**
	 * Return history of payments of a Person
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * 
	 * @return view|JSON
	 */
	public function history(Request $request, Person $person)
	{
		
		$debtReturnHistory				 =	$person->debtReturns("DESC");
		
		if ($request->ajax()) {
			
			$debtReturnsView			 =	view("expenses.partials.tables.payments-debtReturn-table-rows", ["debtReturns" => $debtReturnHistory])->render();
			
			return response()->json([
				"debts"					 =>	$debtReturnsView
			], 200);
			
		}
		
	}
	
}

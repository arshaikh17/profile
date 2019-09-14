<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Generals\Person;
use App\Models\Expenses\{
	Debt
};

class PaymentDebtController extends Controller
{
	
	/**
	 * Saves debt
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 */
	public function store(Request $request, Person $person)
	{
		
		Debt::saveDebt(new Debt, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	$request->is_paid ? Debt::PAID : Debt::UNPAID,
			"person"					 =>	$person,
		]));
		
		if ($request->is_paid) $person->deductAmount(Person::AMOUNT_DEBT, $request->amount);
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Updates debt
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Debt $debt
	 */
	public function update(Request $request, Person $person, Debt $debt)
	{
		
		Debt::saveDebt($debt, array_merge($request->toArray(), [
			"is_paid"					 =>	$request->is_paid ? Debt::PAID : Debt::UNPAID,
		]));
		
		if ($request->is_paid) {
			
			$amount						 =	$debt->amount - $request->amount;
			
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
	 * @param App\Models\Expenses\Debt $debt
	 */
	public function destroy(Request $request, Person $person, Debt $debt)
	{
		
		Debt::removeDebt($debt);
		
		$person->addAmount(Person::AMOUNT_DEBT, $debt->amount);
		
		return redirect()->back()->with("status", "Payment deleted");
		
	}
	
	/**
	 * Marks paid
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Debt $debt
	 */
	public function markPaid(Request $request, Person $person, Debt $debt)
	{
		
		Debt::updateStatus($debt, Debt::GOAL_ACTIVE);
		
		$person->deductAmount(Person::AMOUNT_DEBT, $debt->amount);
		
		return redirect()->back()->with("status", "Payment marked paid");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Debt $debt
	 */
	public function markUnpaid(Request $request, Person $person, Debt $debt)
	{
		
		Debt::updateStatus($debt, Debt::GOAL_INACTIVE);
		
		$person->addAmount(Person::AMOUNT_DEBT, $debt->amount);
		
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
		
		$debtHistory						 =	$person->debts("DESC");
		
		if ($request->ajax()) {
			
			$debtsView					 =	view("expenses.partials.tables.payments-debt-table-rows", ["debts" => $debtHistory])->render();
			
			return response()->json([
				"debts"					 =>	$debtsView
			], 200);
			
		}
		
	}
	
}

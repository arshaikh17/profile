<?php

namespace App\Http\Controllers\Expenses\Payments;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Generals\Person;
use App\Models\Expenses\Payments\{
	DebtTaken
};

class DebtTakenController extends Controller
{
	
	/**
	 * Saves debtTaken
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 */
	public function store(Request $request, Person $person)
	{
		
		DebtTaken::saveDebtTaken(new DebtTaken, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	$request->is_paid ? DebtTaken::PAID : DebtTaken::UNPAID,
			"person"					 =>	$person,
		]));
		
		if ($request->is_paid) $person->addAmount(Person::AMOUNT_DEBT, $request->amount);
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Updates debtTaken
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtTaken $debtTaken
	 */
	public function update(Request $request, Person $person, DebtTaken $debtTaken)
	{
		
		DebtTaken::saveDebtTaken($debtTaken, array_merge($request->toArray(), [
			"is_paid"					 =>	$request->is_paid ? DebtTaken::PAID : DebtTaken::UNPAID,
		]));
		
		if ($request->is_paid) {
			
			$amount						 =	$debtTaken->amount - $request->amount;
			
			if ($amount <= 0) $person->addAmount(Person::AMOUNT_DEBT, $amount);
			if ($amount >= 0) $person->deductAmount(Person::AMOUNT_DEBT, $amount);
			
		}
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtTaken $debtTaken
	 */
	public function destroy(Request $request, Person $person, DebtTaken $debtTaken)
	{
		
		DebtTaken::removeDebtTaken($debtTaken);
		
		$person->deductAmount(Person::AMOUNT_DEBT, $debtTaken->amount);
		
		return redirect()->back()->with("status", "Payment deleted");
		
	}
	
	/**
	 * Marks paid
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtTaken $debtTaken
	 */
	public function markPaid(Request $request, Person $person, DebtTaken $debtTaken)
	{
		
		DebtTaken::updateStatus($debtTaken, DebtTaken::GOAL_ACTIVE);
		
		$person->addAmount(Person::AMOUNT_DEBT, $debtTaken->amount);
		
		return redirect()->back()->with("status", "Payment marked paid");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\DebtTaken $debtTaken
	 */
	public function markUnpaid(Request $request, Person $person, DebtTaken $debtTaken)
	{
		
		DebtTaken::updateStatus($debtTaken, DebtTaken::GOAL_INACTIVE);
		
		$person->deductAmount(Person::AMOUNT_DEBT, $debtTaken->amount);
		
		return redirect()->back()->with("status", "Payment marked unpaid");
		
	}
	
}

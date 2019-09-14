<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Generals\Person;
use App\Models\Expenses\{
	Owe
};

class PaymentOweController extends Controller
{
	
	/**
	 * Saves owe
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 */
	public function store(Request $request, Person $person)
	{
		
		Owe::saveOwe(new Owe, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	$request->is_paid ? Owe::PAID : Owe::UNPAID,
			"person"					 =>	$person,
		]));
		
		if ($request->is_paid) $person->deductAmount(Person::AMOUNT_OWED, $request->amount);
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Updates owe
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Owe $owe
	 */
	public function update(Request $request, Person $person, Owe $owe)
	{
		
		Owe::saveOwe($owe, array_merge($request->toArray(), [
			"is_paid"					 =>	$request->is_paid ? Owe::PAID : Owe::UNPAID,
		]));
		
		if ($request->is_paid) {
			
			$amount						 =	$owe->amount - $request->amount;
			
			if ($amount <= 0) $person->deductAmount(Person::AMOUNT_OWED, $amount);
			if ($amount >= 0) $person->addAmount(Person::AMOUNT_OWED, $amount);
			
		}
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Owe $owe
	 */
	public function destroy(Request $request, Person $person, Owe $owe)
	{
		
		Owe::removeOwe($owe);
		
		$person->addAmount(Person::AMOUNT_OWED, $owe->amount);
		
		return redirect()->back()->with("status", "Payment deleted");
		
	}
	
	/**
	 * Marks paid
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Owe $owe
	 */
	public function markPaid(Request $request, Person $person, Owe $owe)
	{
		
		Owe::updateStatus($owe, Owe::GOAL_ACTIVE);
		
		$person->deductAmount(Person::AMOUNT_OWED, $owe->amount);
		
		return redirect()->back()->with("status", "Payment marked paid");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Owe $owe
	 */
	public function markUnpaid(Request $request, Person $person, Owe $owe)
	{
		
		Owe::updateStatus($owe, Owe::GOAL_INACTIVE);
		
		$person->addAmount(Person::AMOUNT_OWED, $owe->amount);
		
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
		
		$oweHistory						 =	$person->owes("DESC");
		
		if ($request->ajax()) {
			
			$owesView					 =	view("expenses.partials.tables.payments-owe-table-rows", ["owes" => $oweHistory])->render();
			
			return response()->json([
				"owes"					 =>	$owesView
			], 200);
			
		}
		
	}
	
}

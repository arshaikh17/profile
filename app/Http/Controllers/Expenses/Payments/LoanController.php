<?php

namespace App\Http\Controllers\Expenses\Payments;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Generals\Person;
use App\Models\Expenses\Payments\{
	Loan
};

class LoanController extends Controller
{
	
	/**
	 * Saves loan
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 */
	public function store(Request $request, Person $person)
	{
		
		Loan::saveLoan(new Loan, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	$request->is_paid ? Loan::PAID : Loan::UNPAID,
			"person"					 =>	$person,
		]));
		
		if ($request->is_paid) $person->addAmount(Person::AMOUNT_DEBT, $request->amount);
		
		return redirect()->back()->with("status", "Payment saved");
		
	}
	
	/**
	 * Updates loan
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Loan $loan
	 */
	public function update(Request $request, Person $person, Loan $loan)
	{
		
		Loan::saveLoan($loan, array_merge($request->toArray(), [
			"is_paid"					 =>	$request->is_paid ? Loan::PAID : Loan::UNPAID,
		]));
		
		if ($request->is_paid) {
			
			$amount						 =	$loan->amount - $request->amount;
			
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
	 * @param App\Models\Expenses\Loan $loan
	 */
	public function destroy(Request $request, Person $person, Loan $loan)
	{
		
		Loan::removeLoan($loan);
		
		$person->deductAmount(Person::AMOUNT_DEBT, $loan->amount);
		
		return redirect()->back()->with("status", "Payment deleted");
		
	}
	
	/**
	 * Marks paid
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Loan $loan
	 */
	public function markPaid(Request $request, Person $person, Loan $loan)
	{
		
		Loan::updateStatus($loan, Loan::GOAL_ACTIVE);
		
		if ($loan->is_paid) $person->addAmount(Person::AMOUNT_DEBT, $loan->amount);
		
		return redirect()->back()->with("status", "Payment marked paid");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Generals\Person $person
	 * @param App\Models\Expenses\Loan $loan
	 */
	public function markUnpaid(Request $request, Person $person, Loan $loan)
	{
		
		Loan::updateStatus($loan, Loan::GOAL_INACTIVE);
		
		if ($loan->is_paid) $person->deductAmount(Person::AMOUNT_DEBT, $loan->amount);
		
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
		
		$loanHistory				 =	$person->loans("DESC");
		
		if ($request->ajax()) {
			
			$loansView			 =	view("expenses.partials.tables.payments-loan-table-rows", ["loans" => $loanHistory])->render();
			
			return response()->json([
				"debts"					 =>	$loansView
			], 200);
			
		}
		
	}
	
}

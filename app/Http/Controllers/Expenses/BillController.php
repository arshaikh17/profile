<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\Bill;

class BillController extends Controller
{
	
	/**
	 * Saves bill
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Bill::saveBill(new Bill, array_merge($request->toArray(), [
			"date"						 =>	$this->date,
			"is_paid"					 =>	Bill::PAID,
		]));
		
		return redirect()->back()->with("status", "Bill saved");
		
	}
	
	/**
	 * Updates bill
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Bill $bill
	 */
	public function update(Request $request, Bill $bill)
	{
		
		Bill::saveBill($bill, $request->toArray());
		
		return redirect()->back()->with("status", "Bill saved");
		
	}
	
	/**
	 * Destroys bill
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Bill $bill
	 */
	public function destroy(Request $request, Bill $bill)
	{
		
		Bill::removeBill($bill);
		
		return redirect()->back()->with("status", "Bill removed");
		
	}
	
	/**
	 * Marks active
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Bill $bill
	 */
	public function markActive(Request $request, Bill $bill)
	{
		
		Bill::updateStatus($bill, Bill::PAID);
		
		return redirect()->back()->with("status", "Bill marked active");
		
	}
	
	/**
	 * Marks inactive
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Bill $bill
	 */
	public function markInactive(Request $request, Bill $bill)
	{
		
		Bill::updateStatus($bill, Bill::UNPAID);
		
		return redirect()->back()->with("status", "Bill inactive");
		
	}
	
}

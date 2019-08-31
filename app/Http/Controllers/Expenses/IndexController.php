<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Budget,
	Expenditure,
	Tag,
	Bill,
	Saving,
	Allowance
};

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"expenses.";
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$date							 =	$this->date;
		$budget							 =	Budget::getBudget($this->date);
		$expenditures					 =	Expenditure::getExpenditures($this->date);
		$totalAmountSpent				 =	Expenditure::getTotalAmountSpent($this->date);
		$tags							 =	Tag::all();
		$expendituresByTags				 =	Expenditure::getExpendituresByTags($this->date);
		$billNames						 =	Bill::getBillNames();
		$bills							 =	Bill::getBills($this->date);
		$totalBillsPaid					 =	Bill::getTotalBillsPaid($this->date);
		$saving							 =	Saving::getSaving($this->date);
		$allowances						 =	Allowance::getAllowances($this->date);
		$totalAllowances				 =	Allowance::getTotalAllowances($this->date);
		
		$remaining						 =	($budget ? $budget->amount : 0)
											 - $totalAmountSpent
											 - $totalBillsPaid
											 - ($saving && $saving->status == Saving::GOAL_ACTIVE ? $saving->amount : 0)
											 - $totalAllowances
										;
		
		return view(self::VIEW_PATH . "index", compact(
			"date",
			"budget",
			"expenditures",
			"totalAmountSpent",
			"tags",
			"expendituresByTags",
			"billNames",
			"bills",
			"totalBillsPaid",
			"saving",
			"allowances",
			"totalAllowances",
			"remaining"
		));
		
	}
	
}

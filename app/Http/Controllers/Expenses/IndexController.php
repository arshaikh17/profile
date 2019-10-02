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
	Allowance,
	Expense
};

use App\Models\Generals\Person;

use Carbon\Carbon;

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
		
		$expendituresQuery				 =	Expenditure::getExpenditures($this->date, true);
		$expenditures					 =	$expendituresQuery->get();
		
		$totalAmountSpent				 =	Expenditure::getTotalAmountSpent($this->date);
		$tags							 =	Tag::all();
		$expendituresByTags				 =	Expenditure::getExpendituresByTags($this->date);
		$billNames						 =	Bill::getBillNames();
		$bills							 =	Bill::getBills($this->date);
		$totalBillsPaid					 =	Bill::getTotalBillsPaid($this->date);
		$saving							 =	Saving::getSaving($this->date);
		$allowances						 =	Allowance::getAllowances($this->date);
		$totalAllowances				 =	Allowance::getTotalAllowances($this->date);
		$persons						 =	Person::where("debt", ">", 0)->get();
		
		$remaining						 =	($budget ? $budget->amount : 0)
			 - $totalAmountSpent
			 - $totalBillsPaid
			 - ($saving && $saving->status == Saving::GOAL_ACTIVE ? $saving->amount : 0)
			 - $totalAllowances
		;
			
		$charts							 =	[
			"byTags"					 =>	Expense::buildExpendituresByTagsChart($expendituresByTags, Carbon::now()),
			"allExpenses"				 =>	Expense::buildExpendituresChart($expendituresQuery, Carbon::now()),
		];
		
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
			"remaining",
			"persons",
			"charts"
		));
		
	}
	
}

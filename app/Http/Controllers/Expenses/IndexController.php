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
use Carbon\CarbonPeriod;

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"expenses.";
	
	/**
	 * Displays index view
	 * 
	 * @param $date
	 */
	public function index($date = false)
	{
		
		$date							 =	$date ? Carbon::createFromFormat("m-Y", $date) : $this->date;
		$budget							 =	Budget::getBudget($date);
		$expendituresQuery				 =	Expenditure::getExpenditures($date, true);
		$expenditures					 =	$expendituresQuery->get();
		$totalAmountSpent				 =	Expenditure::getTotalAmountSpent($date);
		$tags							 =	Tag::all();
		$expendituresByTags				 =	Expenditure::getExpendituresByTags($date);
		$bills							 =	Bill::getBills($date);
		$totalBillsPaid					 =	Bill::getTotalBillsPaid($date);
		$saving							 =	Saving::getSaving($date);
		$allowances						 =	Allowance::getAllowances($date);
		$totalAllowances				 =	Allowance::getTotalAllowances($date);
		$persons						 =	Person::where("debt", ">", 0)->get();
		
		$remaining						 =	($budget ? $budget->amount : 0)
			 - $totalAmountSpent
			 - $totalBillsPaid
			 - ($saving && $saving->is_paid == Saving::PAID ? $saving->amount : 0)
			 - ($totalAllowances["is_paid"] ? $totalAllowances["total"] : 0)
		;
			
		$charts							 =	[
			"byTags"					 =>	Expense::buildExpendituresByTagsChart($expendituresByTags, $date),
			"allExpenses"				 =>	Expense::buildExpendituresChart($expendituresQuery, $date),
		];
		
		return view(self::VIEW_PATH . "index", compact(
			"date",
			"budget",
			"expenditures",
			"totalAmountSpent",
			"tags",
			"expendituresByTags",
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

<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Budget,
	Expenditure,
	Tag
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
		//dd($d);
		return view(self::VIEW_PATH . "index", compact("date", "budget", "expenditures", "totalAmountSpent", "tags", "expendituresByTags"));
		
	}
	
}

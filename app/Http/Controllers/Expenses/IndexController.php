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
		
		$budget							 =	Budget::getBudget($this->date);
		$expenditures					 =	Expenditure::getExpenditures($this->date);
		$totalAmountSpent				 =	Expenditure::getTotalAmountSpent($this->date);
		//dd();
		
		return view(self::VIEW_PATH . "index", compact("budget", "expenditures", "totalAmountSpent"));
		
	}
	
}

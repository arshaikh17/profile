<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Expenses\ExpenseService;

class ExpensesController extends Controller
{
	
	/**
	 * Scoped Variables
	 */
	protected $date;
	
	protected $service;
	
	/**
	 * Constructor
	 */
	public function __construct(ExpenseService $service)
	{
		
		$this->middleware("auth");
		
		$this->date						 =	\Carbon\Carbon::now();
		
		$this->service					 =	$service;
		
	}
	
}

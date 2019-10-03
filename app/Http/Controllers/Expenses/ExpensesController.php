<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
	
	/**
	 * Scoped Variables
	 */
	protected $date;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
		$this->date						 =	\Carbon\Carbon::now();
		
	}
	
}

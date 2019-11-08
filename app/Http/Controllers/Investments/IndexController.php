<?php

namespace App\Http\Controllers\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Investments\{
	Organisation,
	Investment
};

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"investments.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$types							 =	Organisation::getTypes();
		$investmentTypes				 =	Investment::getTypes();
		$investmentReturnTypes			 =	Investment::getReturnTypes();
		$currencies						 =	Investment::getCurrencies();
		
		return view(self::VIEW_PATH . "index", compact("types", "investmentTypes", "investmentReturnTypes", "currencies"));
		
	}
	
}

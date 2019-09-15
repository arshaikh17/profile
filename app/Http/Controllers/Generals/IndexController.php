<?php

namespace App\Http\Controllers\Generals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"generals.";
	
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
		
		return view(self::VIEW_PATH . ".index");
		
	}
	
}

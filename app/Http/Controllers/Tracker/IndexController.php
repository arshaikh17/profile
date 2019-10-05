<?php

namespace App\Http\Controllers\Tracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"tracker.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Display index view
	 */
	public function index()
	{
		
		return view(self::VIEW_PATH . "index");
		
	}
	
}

<?php

namespace App\Http\Controllers\Tracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tracker\{
	Module,
	Issue
};

class IssueController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"tracker.issues.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Display index view
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function index(Request $request)
	{
		
		
		
	}
	
}

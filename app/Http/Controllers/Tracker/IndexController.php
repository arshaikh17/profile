<?php

namespace App\Http\Controllers\Tracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tracker\{
	Module,
	Issue
};

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
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function index(Request $request)
	{
		
		$statuses						 =	Issue::getStatuses();
		
		if ($request->ajax()) {
			
			$status						 =	$request->status != "false" ? $request->status : Issue::OPEN;
			
			$issues						 =	Issue::with("module")
				->orderBy("id", "DESC")
				->where("status", "=", $status)
				->get()
			;
			
			return response()->json([
				"issues"				 =>	$issues,
			], 200);
			
		}
		
		return view(self::VIEW_PATH . "index", compact("statuses"));
		
	}
	
}

<?php

namespace App\Http\Controllers\Tracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tracker\{
	Module,
	Issue
};

class ModuleIssueController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"tracker.modules.issues.";
	
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
	 * @param App\Models\Tracker\Module $module
	 * 
	 * @return JSON|view
	 */
	public function index(Request $request, Module $module)
	{
		
		if ($request->ajax()) {
			
			return response()->json(["issues" => $module->issues], 200);
			
		}
		
		return view(self::VIEW_PATH . "index");
		
	}
	
	/**
	 * Displays create view
	 * 
	 * @param App\Models\Tracker\Module $module
	 */
	public function create(Module $module)
	{
		
		return $this->form($module, new Issue);
		
	}
	
	/**
	 * Stores issue
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Tracker\Module $module
	 * 
	 * @return JSON
	 */
	public function store(Request $request, Module $module)
	{
		
		Issue::saveIssue(new Issue, array_merge($request->toArray(), ["module_id" => $module->id]));
		
		return response()->json(["message" => "Issue saved"], 200);
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Tracker\Module $module
	 * @param App\Models\Tracker\Issue $issue
	 * 
	 * @return view
	 */
	private function form(Module $module, Issue $issue)
	{
		
		$statuses						 =	Issue::getStatuses();
		
		return view(self::VIEW_PATH . "form", compact("module", "issue", "statuses"));
		
	}
	
}

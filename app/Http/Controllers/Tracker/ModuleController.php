<?php

namespace App\Http\Controllers\Tracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tracker\Module;

class ModuleController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"tracker.modules.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function index(Request $request)
	{
		
		if ($request->ajax()) {
			
			$modules					 =	Module::orderBy("id", "DESC")->paginate(10);
			
			return response()->json([
				"links"					 =>	$modules->links(),
				"modules"				 =>	$modules,
			], 200);
			
		}
		
		return view(self::VIEW_PATH . "index");
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Tracker\Module $module
	 * 
	 * @return JSON
	 */
	public function show(Request $request, Module $module)
	{
		
		if ($request->ajax()) {
			
			return response()->json(["module" => $module], 200);
			
		}
		
	}
	
	/**
	 * Stores record
	 * 
	 * @param Illuminate\Http\Request $request
	 * 
	 * @return JSON
	 */
	public function store(Request $request)
	{
		
		$request->validate(Module::validationFields());
		
		$module							 =	Module::saveModule(new Module, $request->toArray());
		
		if ($request->ajax()) {
			
			return response()->json([
				"module"				 =>	$module,
				"message"				 =>	"{$module->name} added successfully.",
			], 200);
			
		}
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Tracker\Module $module
	 * 
	 * @return JSON
	 */
	public function update(Request $request, Module $module)
	{
		
		$request->validate(Module::validationFields());
		
		$module							 =	Module::saveModule($module, $request->toArray());
		
		if ($request->ajax()) {
			
			return response()->json([
				"module"				 =>	$module,
				"message"				 =>	"{$module->name} saved successfully.",
			], 200);
			
		}
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Tracker\Module $module
	 * 
	 * @return JSON
	 */
	public function destroy(Request $request, Module $module)
	{
		
		$message						 =	"{$module->name} deleted successfully.";
		
		Module::deleteModule($module);
		
		if ($request->ajax()) {
			
			return response()->json(["message" => $message], 200);
			
		}
		
	}
	
}

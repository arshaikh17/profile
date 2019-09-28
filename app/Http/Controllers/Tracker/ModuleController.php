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
	 */
	public function index()
	{
		
		return view(self::VIEW_PATH . "index");
		
	}
	
}

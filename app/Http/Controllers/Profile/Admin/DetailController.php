<?php

namespace App\Http\Controllers\Profile\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Detail;

class DetailController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.admin.details.";
	
	/**
	 * Constructor
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
		
		$details						 =	Detail::all();
		
		return view(self::VIEW_PATH . "index", compact("details"));
		
	}
	
	/**
	 * Saves detail form
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Detail::saveDetails($request->details);
		
		return redirect()->back()->with("status", "Details saved.");
		
	}
	
}

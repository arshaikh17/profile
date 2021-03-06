<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\CV;
use Response;

class CVController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.cvs.";
	
	/**
	 * Scoped variables
	 */
	private $cvs						 =	[];
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
		$this->cvs						 =	CV::all();
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$cvs							 =	$this->cvs;
		
		return view(self::VIEW_PATH . "index", compact("cvs"));
		
	}
	
	/**
	 * Displays index view with CV entity
	 * 
	 * @param App\Models\Profile\CV $cv
	 */
	public function edit(CV $cv)
	{
		
		$cvs							 =	$this->cvs;
		
		return view(self::VIEW_PATH . "edit", compact("cvs", "cv"));
		
	}
	
	/**
	 * Saves CV form
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		CV::saveCV(new Cv, $request->toArray());
		
		return redirect()->back()->with("message", "CV added.");
		
	}
	
	/**
	 * Updates cv form 
	 * 
	 * @param App\Models\Profile\CV $cv
	 * @param Illuminate\Http\Request $request
	 */
	public function update(CV $cv, Request $request)
	{
		
		CV::saveCV($cv, $request->toArray());
		
		return redirect()->back()->with("message", "CV updated.");
		
	}
	
	/**
	 * Returns preview as response
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Profile\CV $cv
	 */
	public function preview(Request $request, CV $cv)
	{
		
		return Response::file(public_path() . CV::$path_cv . $cv->cv);
		
	}
	
}

<?php

namespace App\Http\Controllers\Comics\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Arc;
use App\Models\Comics\Series;

class ArcController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.admin.arcs.";
	
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
		
		$arcs							 =	Arc::all();
		
		return view(self::VIEW_PATH . "index", compact("arcs"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Arc());
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Arc $arc
	 */
	public function edit(Arc $arc)
	{
		
		return $this->getForm($arc);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Arc::saveArc(new Arc, $request);
		
		return redirect()->back()->with("status", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Arc $arc
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Arc $arc, Request $request)
	{
		
		Arc::saveArc($arc, $request);
		
		return redirect()->back()->with("status", "Record updated.");
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Arc $arc
	 */
	private function getForm(Arc $arc)
	{
		
		$series							 =	Series::all();
		$statuses						 =	Arc::getStatusTypes();
		
		return view(self::VIEW_PATH . "form", compact("arc", "series", "statuses"));
		
	}
	
}

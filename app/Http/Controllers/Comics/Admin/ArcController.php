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
		
		$arcs							 =	Arc::paginate(20);
		
		return view(self::VIEW_PATH . "index", compact("arcs"));
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param App\Models\Comics\Arc $arc
	 */
	public function show(Arc $arc)
	{
		
		return view(self::VIEW_PATH . "show", compact("arc"));
		
	}
	
	/**
	 * Displays create view
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	public function create(Series $series = null)
	{
		
		return $this->getForm(new Arc(), $series);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Comics\Arc $arc
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
	 * Performs search on model
	 * 
	 * @param Illuminate\Http\Request $request
	 * @return View $view
	 */
	public function search(Request $request)
	{
		
		$term							 =	$request->term;
		
		$view							 =	"";
		
		$arcs							 =	Arc::searchArcs($term);
		
		foreach ($arcs as $arc) $view	 .=	view("comics.partials.arcs-table-body-row", ["arc" => $arc])->render();
		
		return response()->json([
			"message"					 =>	"Success",
			"data"						 =>	$view
		], 200);
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Arc $arc
	 * @param App\Models\Comics\Series $selectedSeries
	 */
	private function getForm(Arc $arc, Series $selectedSeries = null)
	{
		
		$series							 =	Series::all();
		$statuses						 =	Arc::getStatusTypes();
		
		return view(self::VIEW_PATH . "form", compact("arc", "series", "statuses", "selectedSeries"));
		
	}
	
}

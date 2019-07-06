<?php

namespace App\Http\Controllers\Comics\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Series;
use App\Models\Comics\Character;

class SeriesController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.admin.series.";
	
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
		
		$series					 =	Series::paginate(1);
		
		return view(self::VIEW_PATH . "index", compact("series"));
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	public function show(Series $series)
	{
		
		return view(self::VIEW_PATH . "show", compact("series"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Series);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	public function edit(Series $series)
	{
		
		return $this->getForm($series);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Series::saveSeries(new Series, $request);
		
		return redirect()->back()->with("status", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Models\Comics\Series $series
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Series $series, Request $request)
	{
		
		Series::saveSeries($series, $request);
		
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
		
		$series							 =	Series::searchSeries($term);
		
		foreach ($series as $singleSeries) $view			 .=	view("comics.partials.series-table-body-row", ["series" => $singleSeries])->render();
		
		return response()->json([
			"message"					 =>	"Success",
			"data"						 =>	$view
		], 200);
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Series $series
	 */
	private function getForm(Series $series)
	{
		
		$characters						 =	Character::all();
		
		return view(self::VIEW_PATH . "form", compact("series", "characters"));
		
	}
	
}

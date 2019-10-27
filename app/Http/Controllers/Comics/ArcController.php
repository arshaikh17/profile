<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Comics\ArcService;

use App\Models\Comics\{
	Arc,
	Series
};

class ArcController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.arcs.";
	
	/**
	 * Scoped variables
	 */
	private $service;
	
	/**
	 * Constructor
	 */
	public function __construct(ArcService $service)
	{
		
		$this->service					 =	$service;
		
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
		
		return $this->getForm(new Arc, $series);
		
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
		
		$this->service->save(new Arc, $request->toArray());
		
		return redirect()->back()->with("message", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Comics\Arc $arc
	 */
	public function update(Request $request, Arc $arc)
	{
		
		$this->service->save($arc, $request->toArray());
		
		return redirect()->back()->with("message", "Record updated.");
		
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
		
		$arcs							 =	$this->service->search($term);
		
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
		
		return view(self::VIEW_PATH . "form", compact("arc", "series", "selectedSeries"));
		
	}
	
}

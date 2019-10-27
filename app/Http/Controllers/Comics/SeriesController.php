<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Comics\SeriesService;

use App\Models\Comics\{
	Series,
	Character
};

class SeriesController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.series.";
	
	/**
	 * Scoped variables
	 */
	private $service;
	
	/**
	 * Constructor
	 */
	public function __construct(SeriesService $service)
	{
		
		$this->service					 =	$service;
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$series							 =	Series::all();
		
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
		
		$this->service->save(new Series, $request->toArray());
		
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
		
		$this->service->save($series, $request->toArray());
		
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
		
		$series							 =	$this->service->search($term);
		
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

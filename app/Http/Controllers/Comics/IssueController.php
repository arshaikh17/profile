<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Character;
use App\Models\Comics\Series;
use App\Models\Comics\Arc;
use App\Models\Comics\Issue;
use App\Models\Comics\Author;

class IssueController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.issues.";
	
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
		
		$statistics						 =	Issue::statistics();
		$characters						 =	Character::all();
		
		return view(self::VIEW_PATH . "index", compact("statistics", "characters"));
		
	}
	
	/**
	 * Displays show view
	 */
	public function show(Issue $issue)
	{
		
		return view(self::VIEW_PATH . "show", compact("issue"));
		
	}
	
	/**
	 * Displays create view
	 * 
	 */
	public function create()
	{
		
		return $this->getForm(new Issue);
		
	}
	
	/**
	 * Displays create view with models
	 * 
	 * @param App\Models\Comics\Series $selectedSeries
	 * @param App\Models\Comics\Arc $selectedArc
	 */
	public function createWithSeriesAndArc(Series $selectedSeries, Arc $selectedArc = null)
	{
		
		return $this->getForm(new Issue, $selectedSeries, $selectedArc);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Comics\Issue $issue
	 */
	public function edit(Issue $issue)
	{
		
		return $this->getForm($issue);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Issue::saveIssue(new Issue, $request);
		
		return redirect()->back()->with("message", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Models\Comics\Issue $issue
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Issue $issue, Request $request)
	{
		
		Issue::saveIssue($issue, $request);
		
		return redirect()->back()->with("message", "Record updated.");
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Issue $issue
	 * @param App\Models\Comics\Arc $selectedArc
	 */
	private function getForm(Issue $issue, Series $selectedSeries = null, Arc $selectedArc = null)
	{
		
		$statuses						 =	Issue::getStatuses();
		$series							 =	Series::all();
		$authors						 =	Author::all();
		
		return view(self::VIEW_PATH . "form", compact("issue", "statuses", "series", "authors", "selectedSeries", "selectedArc"));
		
	}
	
}
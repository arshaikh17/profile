<?php

namespace App\Http\Controllers\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Investments\OrganisationService;

use App\Models\Investments\Organisation;

class OrganisationController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"investments.organisations.";
	
	/**
	 * Scoped variables
	 */
	protected $service;
	
	/**
	 * Construct
	 */
	public function __construct(OrganisationService $service)
	{
		
		$this->middleware("auth");
		
		$this->service					 =	$service;
		
	}
	
	/**
	 * Displays index view
	 * 
	 * @param Illuminate\Http\Request $request
	 * 
	 * @return json
	 */
	public function index(Request $request)
	{
		
		if ($request->ajax()) {
			
			return response()->json(["organisations" => Organisation::all()], 200);
			
		}
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * 
	 * @return json
	 */
	public function show(Request $request, Organisation $organisation)
	{
		
		
		$organisation					 =	$organisation
			->with("investments")
			->first()
		;
		
		if ($request->ajax()) {
			
			return response()->json([
				"organisation"			 =>	$organisation
			], 200);
			
		}
		
		return view(self::VIEW_PATH . "show", compact("organisation"));
		
	}
	
	/**
	 * Stores organisation
	 * 
	 * @param Illuminate\Http\Request $request
	 * 
	 * @return JSON
	 */
	public function store(Request $request)
	{
		
		$organisation					 =	$this->service->save(new Organisation, $request->toArray());
		
		if ($request->ajax()) {
			
			return response()->json(["organisation" => $organisation], 200);
			
		}
		
	}
	
	/**
	 * Updates organisation
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * 
	 * @return JSON
	 */
	public function update(Request $request, Organisation $organisation)
	{
		
		$organisation					 =	$this->service->save($organisation, $request->toArray());
		
		if ($request->ajax()) {
			
			return response()->json(["organisation" => $organisation], 200);
			
		}
		
	}
	
	/**
	 * Displays investments view
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * 
	 * @return json
	 */
	public function investments(Request $request, Organisation $organisation)
	{
		
		if ($request->ajax()) {
			
			return response()->json([
				"investments"			 =>	$organisation->investments
			], 200);
			
		}
		
	}
	
}

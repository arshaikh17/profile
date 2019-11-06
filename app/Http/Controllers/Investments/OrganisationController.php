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
	CONST VIEW_PATH						 =	"investments.orginsations.";
	
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
	
}

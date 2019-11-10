<?php

namespace App\Http\Controllers\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Investments\InvestmentService;

use App\Models\Investments\{
	Organisation,
	Investment
};

class InvestmentController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"investments.organisations.investments";
	
	/**
	 * Scoped variables
	 */
	protected $service;
	
	/**
	 * Construct
	 */
	public function __construct(InvestmentService $service)
	{
		
		$this->middleware("auth");
		
		$this->service					 =	$service;
		
	}
	
	/**
	 * Displays index view
	 * 
	 * @param App\Models\Organisation $organisation
	 * @param Illuminate\Http\Request $request
	 * 
	 * @return json
	 */
	public function index(Organisation $organisation, Request $request)
	{
		
		if ($request->ajax()) {
			
			return response()->json(["investments" => $organisation->investments], 200);
			
		}
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * @param App\Models\Investments\Investment $investment
	 * 
	 * @return json
	 */
	public function show(Request $request, Organisation $organisation, Investment $investment)
	{
		
		if ($request->ajax()) {
			
			return response()->json([
				"organisation"			 =>	$organisation,
				"investment"			 =>	$investment
			], 200);
			
		}
		
	}
	
	/**
	 * Stores investment
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * 
	 * @return JSON
	 */
	public function store(Request $request, Organisation $organisation)
	{
		
		$investment						 =	$this->service->save(new Investment, array_merge($request->toArray(), ["organisation_id" => $organisation->id]));
		
		if ($request->ajax()) {
			
			return response()->json(["investment" => $investment], 200);
			
		}
		
	}
	
	/**
	 * Updates investment
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * @param App\Models\Investments\Investment $investment
	 * 
	 * @return JSON
	 */
	public function update(Request $request, Organisation $organisation, Investment $investment)
	{
		
		$investment						 =	$this->service->save($investment, array_merge($request->toArray(), ["organisation_id" => $organisation->id]));
		
		if ($request->ajax()) {
			
			return response()->json(["investment" => $investment], 200);
			
		}
		
	}
	
	/**
	 * Returns ROis
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * @param App\Models\Investments\Investment $investment
	 * 
	 * @return JSON
	 */
	public function rois(Request $request, Organisation $organisation, Investment $investment)
	{
		
		$rois							 =	$investment->rois;
		
		if ($request->ajax()) {
			
			return response()->json(["rois" => $rois], 200);
			
		}
		
	}
	
	
}

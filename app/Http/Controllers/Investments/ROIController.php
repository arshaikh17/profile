<?php

namespace App\Http\Controllers\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Investments\ROIService;

use App\Models\Investments\{
	Organisation,
	Investment,
	ROI
};

class ROIController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"investments.organisations.investments.rois.";
	
	/**
	 * Scoped variables
	 */
	protected $service;
	
	/**
	 * Construct
	 */
	public function __construct(ROIService $service)
	{
		
		$this->middleware("auth");
		
		$this->service					 =	$service;
		
	}
	
	/**
	 * Stores ROI
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * @param App\Models\Investments\Investment $investment
	 * 
	 * @return JSON
	 */
	public function store(Request $request, Organisation $organisation, Investment $investment)
	{
		
		$roi							 =	$this->service->save(new ROI, array_merge($request->toArray(), ["investment_id" => $investment->id]));
		
		if ($request->ajax()) {
			
			return response()->json(["roi" => $roi], 200);
			
		}
		
	}
	
	/**
	 * Updates ROI
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Investments\Organisation $organisation
	 * @param App\Models\Investments\Investment $investment
	 * @param App\Models\Investments\ROI $roi
	 * 
	 * @return JSON
	 */
	public function update(Request $request, Organisation $organisation, Investment $investment, ROI $roi)
	{
		
		$roi							 =	$this->service->save($roi, array_merge($request->toArray(), ["investment_id" => $investment->id]));
		
		if ($request->ajax()) {
			
			return response()->json(["roi" => $roi], 200);
			
		}
		
	}
	
}

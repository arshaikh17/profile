<?php

namespace App\Services\Investments;

use Illuminate\Http\Request;

use App\Models\Investments\ROI;

use Carbon\Carbon;

class ROIService
{
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		//
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Investments\ROI $roi
	 * @param Array $data
	 * 
	 * @return App\Models\Investments\ROI $roi
	 */
	public function save(ROI $roi, Array $data)
	{
		
		$roi->fill(array_merge($data, ["paid_at" => Carbon::parse($data["paid_at"])]));
		
		$roi->investment()->associate($data["investment_id"]);
		
		$roi->save();
		
		return $roi;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Investments\ROI $roi
	 */
	public function delete(ROI $roi)
	{
		
		$roi->delete();
		
	}
	
}

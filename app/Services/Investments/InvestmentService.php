<?php

namespace App\Services\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Investments\InvestmentController;

use App\Models\Investments\Investment;

class InvestmentService
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
	 * @param App\Models\Investments\Investment $investment
	 * @param Array $data
	 * 
	 * @return App\Models\Investments\Investment $investment
	 */
	public function save(Investment $investment, Array $data)
	{
		
		$investment->fill($data);
		
		$investment->save();
		
		return $investment;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Investments\Investment $investment
	 */
	public function delete(Investment $investment)
	{
		
		$investment->delete();
		
	}
	
}

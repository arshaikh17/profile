<?php

namespace App\Services\Investments;

use Illuminate\Http\Request;
use App\Http\Controllers\Investments\OrganisationController;

use App\Models\Investments\Organisation;

class OrganisationService
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
	 * @param App\Models\Investments\Organisation $organisation
	 * @param Array $data
	 * 
	 * @return App\Models\Investments\Organisation $organisation
	 */
	public function save(Organisation $organisation, Array $data)
	{
		
		$organisation->fill($data);
		
		$organisation->save();
		
		return $organisation;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Investments\Organisation $organisation
	 */
	public function delete(Organisation $organisation)
	{
		
		$organisation->delete();
		
	}
	
}

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
		
		$logo							 =	$organisation->logo;
		
		if ($data["organisation_logo"] ?? false) {
			
			$file						 =	$data["organisation_logo"];
			
			//if (file_exists(public_path() . Organisation::$path_logo . $logo)) var_dump(unlink(public_path() . Organisation::$path_logo . $logo));
			
			$logo						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . Organisation::$path_logo, $logo);
			
		}
		
		$organisation->fill(array_merge($data, ["logo" => $logo]));
		
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

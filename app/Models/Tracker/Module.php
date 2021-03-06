<?php

namespace App\Models\Tracker;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TrackerTrait;

use App\Models\Tracker\Issue;

class Module extends Model
{
	
	/**
	 * Traits
	 */
	use TrackerTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"name",
		"description"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns fields for  validation
	 * 
	 * @return Array
	 */
	public static function validationFields()
	{
		
		return [
			"name"						 =>	"required",
			"description"				 =>	"required",
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Tracker\Module $module
	 * @param Array $data
	 * 
	 * @return App\Models\Tracker\Module $module
	 */
	public static function saveModule(Module $module, Array $data)
	{
		
		$module->fill($data);
		
		$module->save();
		
		return $module;
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param App\Models\Tracker\Module $module
	 */
	public static function deleteModule(Module $module)
	{
		
		$module->delete();
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns issues associated with this module
	 * 
	 * @return App\Models\Tracker\Issue[]
	 */
	public function issues()
	{
		
		return $this->hasMany(Issue::class);
		
	}
	
}

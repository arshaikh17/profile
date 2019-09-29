<?php

namespace App\Models\Tracker;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TrackerTrait;

use App\Models\Tracker\Module;

use Carbon;

class Issue extends Model
{
	
	/**
	 * Traits
	 */
	use TrackerTrait;
	
	/**
	 * Constants
	 */
	CONST OPEN							 =	1;
	CONST CLOSED						 =	2;
	CONST INPROGRESS					 =	3;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"title",
		"description",
		"url",
		"current_status",
		"module_id",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"status",
	];
	
	/**
	 * Casts
	 */
	protected $cast						 =	[
		"created_at"					 =>	"Carbon",
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
			"title"						 =>	"required",
			"description"				 =>	"required",
			"url"						 =>	"required",
			"current_status"			 =>	"required",
		];
		
	}
	
	/**
	 * Returns statuses
	 * 
	 * @return Array
	 */
	public static function getStatuses()
	{
		
		return [
			self::OPEN					 =>	"Open",
			self::CLOSED				 =>	"Closed",
			self::INPROGRESS			 =>	"In Progress",
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Tracker\Issue $issue
	 * @param Array $data
	 * 
	 * @return App\Models\Tracker\Issue $issue
	 */
	public static function saveIssue(Issue $issue, Array $data)
	{
		
		$issue->fill($data);
		
		$issue->save();
		
		if (isset($data["module_id"])) $issue->module()->associate($data["module_id"]);
		
		return $issue;
		
	}
	
	/**
	 * Destroys record
	 * 
	 * @param App\Models\Tracker\Issue $issue
	 */
	public static function deleteIssue(Issue $issue)
	{
		
		$issue->delete();
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Returns status field
	 * 
	 * @return String
	 */
	public function getStatusAttribute()
	{
		
		return self::getStatuses()[$this->current_status] ?? "-";
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns the module it belongs to
	 * 
	 * @return App\Models\Tracker\Module
	 */
	public function module()
	{
		
		return $this->belongsTo(Module::class);
		
	}
	
}

<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\Expenses\GoalTypeScope;

use DateTime;

trait ExpensesGoalsTrait
{
	
	/**
	 * Table
	 */
	protected $tableName				 =	"expenses_goals";
	
	/**
	 * Fillable
	 */
	protected $fillableColumns			 =	[
		"amount",
		"goal_type",
		"description",
		"date",
		"status",
	];
	
	/**
	 * Applies global scope
	 */
	protected static function boot()
	{
		
		parent::boot();
		
		static::addGlobalScope(new GoalTypeScope);
		
		static::creating(function($asset) {
			
			$asset->setAttribute("goal_type", $asset->getGoalType());
			
		});
		
	}
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		self::boot();
		$this->setTable($this->tableName);
		$this->fillable($this->fillableColumns);
		
	}
	
	/**
	 * Return goal type of model
	 * 
	 * @return Integer $goal_type
	 */
	public function getGoalType()
	{
		
		return $this->goal_type;
		
	}
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Saving|Allowance $goal
	 * @param Array $data
	 */
	public static function saveGoal($goal, $data)
	{
		
		$goal->fill($data);
		
		$goal->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Saving|Allowance $goal
	 */
	public static function removeGoal($goal)
	{
		
		$goal->delete();
		
	}
	
	/**
	 * Gets goals
	 * 
	 * @param App\Models\Expenses\Saving|Allowance $goal
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Saving|Allowance[]
	 */
	public static function getGoals($goal, DateTime $dateTime)
	{
		
		return $goal->whereMonthAndYear("date", "=", $dateTime)
			->orderBy("id", "DESC")
			->get()
		;
		
	}
	
	/**
	 * Update status
	 * 
	 * @param App\Models\Expenses\Saving|Allowance $goal
	 * @param Integer $status
	 */
	public static function updateStatus($goal, $status)
	{
		
		$goal->update([
			"status"					 =>	$status
		]);
		
	}
	
}
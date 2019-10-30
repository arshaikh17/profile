<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ModelTypeScope;

use Carbon\Carbon;

trait ExpensesExpendituresTrait
{
	
	/**
	 * Table
	 */
	protected $tableName				 =	"expenses_expenditures";
	
	/**
	 * Fillables
	 */
	protected $fillableColumns			 =	[
		"amount",
		"description",
		"is_paid",
		"tag_id",
		"date",
	];
	
	/**
	 * Applies global scope
	 */
	protected static function boot()
	{
		
		parent::boot();
		
		static::addGlobalScope(new ModelTypeScope("expenditure_type"));
		
		static::creating(function($asset) {
			
			$asset->setAttribute("expenditure_type", $asset->getModelType());
			
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
	 * @return Integer $model_type
	 */
	public function getModelType()
	{
		
		return $this->model_type;
		
	}
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Gets expenditures
	 * 
	 * @param App\Models\Expenses\Expenditure|Saving|Allowance|Bill $expenditure
	 * @param Carbon $date
	 * 
	 * @return App\Models\Expenses\Expenditure|Saving|Allowance|Bill[]
	 */
	public static function getExpenses($expenditure, Carbon $date)
	{
		
		return $expenditure->whereMonthAndYear("date", "=", $date)
			->orderBy("id", "DESC")
		;
		
	}
	
	/**
	 * Update status
	 * 
	 * @param App\Models\Expenses\Expenditure|Saving|Allowance|Bill $xpenditure
	 * @param Integer $status
	 */
	public static function updateStatus($expenditure, $status)
	{
		
		$expenditure->update([
			"is_paid"					 =>	$status
		]);
		
	}
	
}
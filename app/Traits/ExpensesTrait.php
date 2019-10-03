<?php

namespace App\Traits;

use App\Traits\ModelTrait;

trait ExpensesTrait
{
	
	/**
	 * Traits
	 */
	use ModelTrait;
	
	/**
	 * Scoped Variables
	 */
	protected $table_prefix				 =	"expenses_";
	
	/**
	 * Return goal type of model
	 * 
	 * @return Integer $model_type
	 */
	public function getModelType()
	{
		
		return $this->model_type;
		
	}
	
}
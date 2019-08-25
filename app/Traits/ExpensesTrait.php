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
	 * Scopped Variables
	 */
	protected $table_prefix				 =	"expenses_";
	
}
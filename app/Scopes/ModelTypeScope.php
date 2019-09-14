<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ModelTypeScope implements Scope
{
	
	/**
	 * Scoped variables
	 */
	protected $column					 =	"type";
	
	/**
	 * Construct
	 */
	public function __construct($column = false)
	{
		
		if ($column) $this->column		 =	$column;
		
	}
	
	/**
	 * Applies scope
	 * 
	 * @param Illuminate\Database\Eloquent\Builder $builder
	 * @param Illuminate\Database\Eloquent\Model $model
	 */
	public function apply(Builder $builder, Model $model)
	{
		
		$builder->where($this->column, "=", $model->getModelType());
		
	}
	
}
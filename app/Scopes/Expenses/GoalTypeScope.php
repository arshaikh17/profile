<?php

namespace App\Scopes\Expenses;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class GoalTypeScope implements Scope
{
	
	/**
	 * Applies scope
	 * 
	 * @param Illuminate\Database\Eloquent\Builder $builder
	 * @param Illuminate\Database\Eloquent\Model $model
	 */
	public function apply(Builder $builder, Model $model)
	{
		
		$builder->where("goal_type", "=", $model->getGoalType());
		
	}
	
}
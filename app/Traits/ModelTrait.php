<?php

namespace App\Traits;

trait ModelTrait
{
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @param App\Model[] $model
	 * @return array $ids
	 */
	public function getModelIDs($modelCollection) {
		
		$ids							 =	[];
		
		foreach ($modelCollection as $model) {
			
			$ids[]						 =	$model->id;
			
		}
		
		return $ids;
		
	}
	
}
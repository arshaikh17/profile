<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
	
	/**
	 * Constants
	 */
	CONST ENTITY_PROJECT				 =	2;
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @param App\Model[] $model
	 * @return array $ids
	 */
	public static function getModelIDs($modelCollection) {
		
		$ids							 =	[];
		
		foreach ($modelCollection as $model) {
			
			$ids[]						 =	$model->id;
			
		}
		
		return $ids;
		
	}
	
}

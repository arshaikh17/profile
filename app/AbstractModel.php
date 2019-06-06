<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
	
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

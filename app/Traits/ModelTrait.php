<?php

namespace App\Traits;

use Illuminate\Support\Str;

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
	
	/**
	 * Appends prefix to table name
	 * 
	 * @return $table
	 */
	public function getTable() {
		
		$model							 =	explode("\\", get_class($this));
		$model							 =	Str::lower(array_pop($model));
		
		if (!isset($this->table)) $this->setTable(Str::plural($this->table_prefix . $model));
		
		return $this->table;
		
	}
	
}
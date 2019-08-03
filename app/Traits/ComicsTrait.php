<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ComicsTrait
{
	
	/**
	 * Scopped Variables
	 */
	protected $table_prefix				 =	"comics_";
	
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
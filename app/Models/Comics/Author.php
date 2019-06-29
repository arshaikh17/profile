<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	
	/**
	 * Table
	 */
	protected $table					 =	"comics_authors";
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"name"
	];
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	public function getNameAttribute()
	{
		
		return "{$this->first_name} {$this->surname}";
		
	}
	
}

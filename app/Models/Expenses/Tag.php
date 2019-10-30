<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Models\Expenses\{
	Expense
};

class Tag extends Expense
{
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"name",
		"description",
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/* =====================================================
	 * 							RELATIONS					
	 * ===================================================*/
	
	/**
	 * Returns all the expenditures associated with the tag
	 * 
	 * @return App\Models\Expenses\Expenditure[]
	 */
	public function expenditures()
	{
		
		return $this->hasMany(Expenditure::class, "id", "tag_id");
		
	}
	
}

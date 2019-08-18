<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ExpensesTrait;

class Tag extends Model
{
	
	/**
	 * Traits
	 */
	use ExpensesTrait;
	
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
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Tag $tag
	 * @param Array $data
	 */
	public static function saveTag(Tag $tag, $data)
	{
		
		$tag->fill([
			"name"						 =>	$data["name"],
			"description"				 =>	$data["description"] ?? "",
		]);
		
		$tag->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Tag $tag
	 */
	public static function removeTag(Tag $tag)
	{
		
		$tag->delete();
		
	}
	
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

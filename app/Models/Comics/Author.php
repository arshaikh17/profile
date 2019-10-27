<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

class Author extends Model
{
	
	/**
	 * Traits
	 */
	use ComicsTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"first_name",
		"surname"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"name"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Author::all());
		
	}
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns issues associated with author
	 * 
	 * @return App\Models\Comics\Issue $issues[]
	 */
	public function issues()
	{
		
		return $this->belongsToMany(Issue::class, "comics_issues_authors", "author_id");
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Return first_name and surname concatenated
	 * 
	 * @return String $name
	 */
	public function getNameAttribute()
	{
		
		return "{$this->first_name} {$this->surname}";
		
	}
	
}

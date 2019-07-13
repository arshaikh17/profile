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
	 * Saves record
	 * 
	 * @param App\Models\Comics\Author $author
	 * @param json $data[]
	 */
	public static function saveAuthor(Author $author, $data)
	{
		
		$author->fill([
			"first_name"				 =>	$data->first_name,
			"surname"					 =>	$data->surname
		]);
		
		$author->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Comics\Author $author
	 */
	public static function removeAuthor(Author $author)
	{
		
		$author->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * @return App\Models\Comics\Author $authors[]
	 */
	public static function searchAuthors($term)
	{
		
		return Author::whereRaw("CONCAT(first_name, CONCAT(' ', surname)) LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
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
	 * 						MUTATORS						
	 * ===================================================*/
	
	public function getNameAttribute()
	{
		
		return "{$this->first_name} {$this->surname}";
		
	}
	
}

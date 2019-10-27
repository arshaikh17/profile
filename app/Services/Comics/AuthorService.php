<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\AuthorController;

use App\Models\Comics\Author;

class AuthorService
{
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		//
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Author $author
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Author $author
	 */
	public function save(Author $author, Array $data)
	{
		
		$author->fill($data);
		
		$author->save();
		
		return $author;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Author $author
	 */
	public function delete(Author $author)
	{
		
		$author->delete();
		
	}
	
	/**
	 * Searches the model
	 * 
	 * @param String $term
	 * 
	 * @return App\Models\Comics\Author $authors[]
	 */
	public static function search($term)
	{
		
		return Author::whereRaw("CONCAT(first_name, CONCAT(' ', surname)) LIKE '%" . $term . "%'")
			->get()
		;
		
	}
	
}

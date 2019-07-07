<?php

/**
 * This model provides mean to access other related models.
 * Eliminates need to go through every other model individually
 */

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Comics\Character;
use App\Models\Comics\Series;
use App\Models\Comics\Arc;
use App\Models\Comics\Issue;
use App\Models\Comics\Author;

class Comics extends Model
{
	
	/* =====================================================
	 * 						MODEL MAPPERS					
	 * ===================================================*/
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Series
	 */
	public function series()
	{
		
		return new Series;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Character
	 */
	public function characters()
	{
		
		return new Character;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Arc
	 */
	public function arcs()
	{
		
		return new Arc;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Issue
	 */
	public function issues()
	{
		
		return new Issue;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Author
	 */
	public function authors()
	{
		
		return new Author;
		
	}
	
}

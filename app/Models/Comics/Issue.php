<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\Arc;
use App\Models\Comics\Series;
use App\Models\Comics\Author;

class Issue extends Model
{
	
	/**
	 * Traits
	 */
	use ComicsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"issue",
		"cover",
		"is_wishlist",
	];
	
	/**
	 * Scoped Variable
	 */
	public static $path_logo			 =	"/uploads/comics/issues/";
	
	/**
	 * Constants
	 */
	CONST STATUS_OWNED					 =	0;
	CONST STATUS_WISHLIST				 =	1;
	
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
		
		return (new self)->getModelIDs(Issue::all());
		
	}
	
	/**
	 * Marks issue as owned
	 *
	 * @param App\Models\Comics\Issue $issue
	 */
	public static function markOwned(Issue $issue)
	{
		
		$issue->update([
			"is_wishlist"				 =>	self::STATUS_OWNED
		]);
		
	}
	
	
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns arc associated with issue
	 * 
	 * @return App\Models\Comics\Arc $arc
	 */
	public function arc()
	{
		
		return $this->belongsTo(Arc::class, "arc_id", "id");
		
	}
	
	/**
	 * Returns series associated with issue
	 * 
	 * @return App\Models\Comics\Series $series
	 */
	public function series()
	{
		
		return $this->belongsTo(Series::class, "series_id", "id");
		
	}
	
	/**
	 * Returns authors associated with issue
	 * 
	 * @return App\Models\Comics\Author $authors
	 */
	public function authors()
	{
		
		return $this->belongsToMany(Author::class, "comics_issues_authors", "issue_id", "author_id");
		
	}
	
}

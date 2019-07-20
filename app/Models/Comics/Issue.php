<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelTrait;
use App\Models\Comics\Arc;
use App\Models\Comics\Series;
use App\Models\Comics\Author;

class Issue extends Model
{
	
	use ModelTrait;
	
	/**
	 * Table
	 */
	protected $table					 =	"comics_issues";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"issue",
		"cover",
		"owned_status",
	];
	
	/**
	 * Scoped Variable
	 */
	private static $path_logo			 =	"/uploads/comics/issues/";
	
	/**
	 * Constants
	 */
	CONST STATUS_OWNED					 =	1;
	CONST STATUS_WISHLIST				 =	2;
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Issue $issue
	 * @param json $data[]
	 * @return App\Models\Comics\Issue
	 */
	public static function saveIssue(Issue $issue, $data)
	{
		
		$cover							 =	$issue->cover;
		
		if ($data->hasFile("cover")) {
			
			$file						 =	$data->file("cover");
			
			//if (file_exists(public_path() . self::$path_logo . $cover)) var_dump(unlink(public_path() . self::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . self::$path_logo, $cover);
			
		}
		
		$issue->fill([
			"title"						 =>	$data->title,
			"issue"						 =>	$data->issue,
			"owned_status"				 =>	$data->owned_status,
			"cover"						 =>	$cover
		]);
		
		if ($data->series_id) $issue->series()->associate($data->series_id);
		if ($data->arc_id) $issue->arc()->associate(Arc::find($data->arc_id));
		
		$issue->save();
		
		if ($data->author_ids && count($data->author_ids)) foreach ($data->author_ids as $author_id) $issue->authors()->attach($author_id);
		
		//Save New Authors
		if ($data->authors) {
			
			foreach ($data->authors as $author) {
				
				$author					 =	Author::saveAuthor(new Author, $author);
				
				$issue->authors()->attach($author);
				
			}
			
		}
		
		return $issue;
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Comics\Issue $issue
	 */
	public static function removeIssue(Issue $issue)
	{
		
		$issue->delete();
		
	}
	
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
	 * Returns issue owned status types
	 * 
	 * @return array $statuses
	 */
	public static function getStatuses()
	{
		
		return [
			self::STATUS_OWNED			 =>	"Owned",
			self::STATUS_WISHLIST		 =>	"Wishlist",
		];
		
	}
	
	/**
	 * Marks issue as owned
	 *
	 * @param App\Models\Comics\Issue $issue
	 */
	public static function markOwned(Issue $issue)
	{
		
		$issue->update([
			"owned_status"				 =>	self::STATUS_OWNED
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

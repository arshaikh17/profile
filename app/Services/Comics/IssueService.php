<?php

namespace App\Services\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Comics\IssueController;

use App\Services\Comics\AuthorService;

use App\Models\Comics\{
	Arc,
	Issue,
	Author
};

class IssueService
{
	
	/**
	 * Scoped variables
	 */
	protected $authorService;
	
	/**
	 * Construct
	 */
	public function __construct(AuthorService $authorService)
	{
		
		$this->authorService			 =	$authorService;
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Comics\Issue $issue
	 * @param Array $data
	 * 
	 * @return App\Models\Comics\Issue $issue
	 */
	public function save(Issue $issue, Array $data)
	{
		
		$cover							 =	$issue->cover;
		
		if ($data["cover"] ?? false) {
			
			$file						 =	$data["cover"];
			
			//if (file_exists(public_path() . Issue::$path_logo . $cover)) var_dump(unlink(public_path() . Issue::$path_logo . $cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalExtension();
			
			$file->move(public_path() . Issue::$path_logo, $cover);
			
		}
		
		$issue->fill([
			"title"						 =>	$data["title"] ?? "",
			"issue"						 =>	$data["issue"] ?? "",
			"is_wishlist"				 =>	$data["is_wishlist"] ?? Issue::STATUS_WISHLIST,
			"cover"						 =>	$cover
		]);
		
		if ($data["series_id"] ?? false) $issue->series()->associate($data["series_id"]);
		if ($data["arc_id"] ?? false) $issue->arc()->associate(Arc::find($data["arc_id"]));
		
		$issue->save();
		
		if ($data["author_ids"] && count($data["author_ids"])) foreach ($data["author_ids"] as $author_id) $issue->authors()->attach($author_id);
		
		//Save New Authors
		if ($data["authors"] ?? false) {
			
			foreach ($data["authors"] as $author) {
				
				$author					 =	$this->authorService->save(new Author, $author);
				
				$issue->authors()->attach($author);
				
			}
			
		}
		
		return $issue;
		
	}
	
	/**
	 * Deletes record
	 * 
	 * @param App\Models\Comics\Issue $issue
	 */
	public function delete(Issue $issue)
	{
		
		$issue->delete();
		
	}
	
	/**
	 * Returns details about Issues
	 * 
	 * @return Array $statistics
	 */
	public function statistics()
	{
		
		$statistics						 =	[];
		
		$statistics						 =	[
			"total"						 =>	Issue::count(),
			"owned"						 =>	Issue::where("is_wishlist", "=", Issue::STATUS_OWNED)->count(),
			"wishlist"					 =>	Issue::where("is_wishlist", "=", Issue::STATUS_WISHLIST)->count()
		];
		
		return $statistics;
		
	}
	
}

<?php

namespace App\Http\Controllers\Comics\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Author;

class AuthorController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.admin.authors.";
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$authors						 =	Author::paginate(30);
		
		return view(self::VIEW_PATH . "index", compact("authors"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Author);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Comics\Author $author
	 */
	public function edit(Author $author)
	{
		
		return $this->getForm($author);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Author::saveAuthor(new Author, $request);
		
		return redirect()->back()->with("status", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Models\Comics\Author $author
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Author $author, Request $request)
	{
		
		Author::saveAuthor($author, $request);
		
		return redirect()->back()->with("status", "Record updated.");
		
	}
	
	/**
	 * Performs search on model
	 * 
	 * @param Illuminate\Http\Request $request
	 * @return View $view
	 */
	public function search(Request $request)
	{
		
		$term							 =	$request->term;
		
		$view							 =	"";
		
		$authors						 =	Author::searchAuthors($term);
		
		foreach ($authors as $author) $view					 .=	view("comics.partials.authors-table-body-row", ["author" => $author])->render();
		
		return response()->json([
			"message"					 =>	"Success",
			"data"						 =>	$view
		], 200);
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Author $author
	 */
	private function getForm(Author $author)
	{
		
		return view(self::VIEW_PATH . "form", compact("author"));
		
	}
	
}

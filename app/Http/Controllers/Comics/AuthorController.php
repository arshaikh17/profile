<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Author;

class AuthorController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.index.authors.";
	
	/**
	 * Displays show view
	 * 
	 * @param App\Models\Comics\Author $author
	 */
	public function show(Author $author)
	{
		
		return view(self::VIEW_PATH . "show", compact("author"));
		
	}
	
}

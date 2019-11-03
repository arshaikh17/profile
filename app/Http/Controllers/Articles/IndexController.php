<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	
	/**
	 * Dummy method
	 */
	public function dummy()
	{
		
		return view("articles.dummy");
		
	}
	
}

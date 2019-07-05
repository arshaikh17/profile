<?php

namespace App\Http\Controllers\Wishlists\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Issue;

class MarkOwnedController extends Controller
{
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Marks issues as owned
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Comics\Issue $issue
	 */
	public function issue(Request $request, Issue $issue)
	{
		
		Issue::markOwned($issue);
		
		return redirect()->back()->with("message", "Issue marked owned.");
		
	}
	
}

<?php

namespace App\Http\Controllers\Comics\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminController extends Controller
{
	
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
		
		$comics							 =	Auth::user()->comics();
		
		return view("comics.admin.index", compact("comics"));
		
	}
	
}

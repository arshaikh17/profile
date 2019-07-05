<?php

namespace App\Http\Controllers\Wishlists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Wishlists\Wishlist;

class IndexController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"wishlists.";
	
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
		
		$comics							 =	Wishlist::getComicsWishlists();
		
		return view(self::VIEW_PATH . "index", compact(
			"comics"
		));
		
	}
	
}

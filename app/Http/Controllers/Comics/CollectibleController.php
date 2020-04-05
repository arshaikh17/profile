<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\{
	Collectible
};

class CollectibleController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.collectibles.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		
	}
	
	/**
	 * Displays index view
	 */
	public function index(Request $request)
	{
		
		$collectibles					 =	[];
		
		foreach (config("comics.brands") as $brandKey => $brand) {
			
			$collectibles[$brand]	 =	Collectible::where("brand_id", "=", $brandKey)->get();
			
		}
		
		if ($request->ajax()) return $collectibles->toJson();
		
		return view(self::VIEW_PATH . "index", compact("collectibles"));
		
	}
	
	
}

<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Comics\CollectibleRequest;
use App\Services\Comics\CollectibleService;

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
	 * Class Variables
	 */
	protected $service;
	
	/**
	 * Construct
	 */
	public function __construct(CollectibleService $service)
	{
		
		$this->service					 =	$service;
		
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
	
	/**
	 * Displays create view
	 * 
	 */
	public function create()
	{
		
		return $this->getForm(new Collectible);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Comics\Collectible $collectible
	 */
	public function edit(Collectible $collectible)
	{
		
		return $this->getForm($collectible);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Http\Requests\Comics\CollectibleRequest $request
	 */
	public function store(CollectibleRequest $request)
	{
		
		$this->service->save(new Collectible, $request->toArray());
		
		return redirect()->back()->with("message", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Models\Comics\Collectible $collectible
	 * @param App\Http\Requests\Comics\CollectibleRequest $request
	 */
	public function update(Collectible $collectible, CollectibleRequest $request)
	{
		
		$this->service->save($collectible, $request->toArray());
		
		return redirect()->back()->with("message", "Record updated.");
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Collectible $collectible
	 */
	private function getForm(Collectible $collectible)
	{
		
		return view(self::VIEW_PATH . "form", compact("collectible"));
		
	}
	
}
